import joblib
from process_data import load_data

model = joblib.load("user_model.pkl")
test_features = load_data("keystrokes.json") 

log_likelihood = model.score(test_features)
print("Log Likelihood Score:", log_likelihood)

threshold = -30 
if log_likelihood > threshold:
    print("✅ User Authenticated")
else:
    print("❌ Imposter Detected")
