from flask import Flask, request, render_template
import pandas as pd
import numpy as np
from sklearn.preprocessing import LabelEncoder
from sklearn.ensemble import GradientBoostingClassifier
from sklearn.model_selection import train_test_split
import os

app = Flask(__name__)

# Load dataset
dataset_path = os.path.join(os.path.dirname(__file__), 'car_sales_data.csv')
df = pd.read_csv(dataset_path)

# Combine Make and Model into a single label for classification
df["Label"] = df["Make"] + " " + df["Model"]

# Encode categorical features
label_encoders = {}
categorical_cols = ["Make", "Fuel Type", "Transmission", "Label"]

for col in categorical_cols:
    le = LabelEncoder()
    df[col] = le.fit_transform(df[col])
    label_encoders[col] = le

# Features and target
features = ["Price", "Mileage", "Year", "Fuel Type", "Make", "Transmission"]
X = df[features]
y = df["Label"]

# Train/test split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train classifier
clf = GradientBoostingClassifier(n_estimators=100, random_state=42)
clf.fit(X_train, y_train)

# Prediction function
def classify_recommendation(budget, fuel_type, transmission, year=None):
    try:
        fuel_encoded = label_encoders["Fuel Type"].transform([fuel_type])[0]
        transmission_encoded = label_encoders["Transmission"].transform([transmission])[0]
    except ValueError:
        print("Encoding error: Invalid fuel type or transmission.")
        return None

    # Define a price range around the budget
    lower_bound = budget - 2000
    upper_bound = budget + 2000

    # Filter based on budget, fuel type, transmission, and optionally year
    if year:
        possible_matches = df[(df["Price"] >= lower_bound) & 
                              (df["Price"] <= upper_bound) & 
                              (df["Fuel Type"] == fuel_encoded) & 
                              (df["Transmission"] == transmission_encoded) &
                              (df["Year"] == year)]
    else:
        possible_matches = df[(df["Price"] >= lower_bound) & 
                              (df["Price"] <= upper_bound) & 
                              (df["Fuel Type"] == fuel_encoded) & 
                              (df["Transmission"] == transmission_encoded)]

    print("Filtered dataset:")
    print(possible_matches)

    if possible_matches.empty:
        return None

    # Prepare input for the classifier based on available matches
    X_matches = possible_matches[features]
    predictions = clf.predict(X_matches)

    # Add predictions to possible matches
    possible_matches = possible_matches.copy()  # Avoid SettingWithCopyWarning
    possible_matches["Predicted Label"] = label_encoders["Label"].inverse_transform(predictions)

    # Filter and sort by price to ensure budget compliance
    top_matches = possible_matches.sort_values("Price").head(6)

    # Decode the "Make" and "Fuel Type" columns back to original names
    top_matches["Make"] = label_encoders["Make"].inverse_transform(top_matches["Make"])
    top_matches["Fuel Type"] = label_encoders["Fuel Type"].inverse_transform(top_matches["Fuel Type"])
    top_matches["Transmission"] = label_encoders["Transmission"].inverse_transform(top_matches["Transmission"])

    return top_matches[["Make", "Model", "Year", "Mileage", "Fuel Type", "Transmission", "Price"]]

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        budget = float(request.form['budget'])
        fuel_type = request.form['fuel_type']
        transmission = request.form['transmission']
        year_input = request.form['year']
        year = int(year_input) if year_input else None

        print(f"Received: Budget={budget}, Fuel Type={fuel_type}, Transmission={transmission}, Year={year}")

        car_info = classify_recommendation(budget, fuel_type, transmission, year)

        if car_info is not None:
            return render_template('index.html', tables=[car_info.to_html(classes='data', header="true")])
        else:
            return render_template('index.html', error="No recommendation could be made with the provided input.")
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)