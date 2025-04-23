from hmmlearn import hmm
import numpy as np
import joblib
from process_data import load_data
import os

os.environ["OMP_NUM_THREADS"] = "1"

X = load_data("keystrokes.json")
print("Feature shape:", X.shape)

if X.shape[0] < 5:
    raise ValueError("❗ Not enough data. Please type more samples.")

model = hmm.GaussianHMM(n_components=4, covariance_type="diag", n_iter=1000)
model.fit(X)

joblib.dump(model, "user_model.pkl")

if os.path.exists("user_model.pkl"):
    print("✅ Model successfully saved as user_model.pkl")
else:
    print("❌ Model saving failed.")
