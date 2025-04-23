import json
import numpy as np

def load_data(filename):
    with open(filename, "r") as f:
        raw = json.load(f)

    features = []
    for entry in raw:
        features.append([entry["dwell"], entry["flight"]])
    return np.array(features)

features = load_data("keystrokes.json")
print("Feature shape:", features.shape)
