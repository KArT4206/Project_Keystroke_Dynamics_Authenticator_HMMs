# Personalized Keystroke Dynamics Authenticator using Hidden Markov Models (HMMs)

A biometric authentication system that verifies users based on their unique typing rhythm. The system captures timing patterns (dwell time and flight time) and uses a Hidden Markov Model (HMM) to distinguish between genuine users and imposters with high accuracy.

---

## Overview

This project involves:
- Keystroke Logging: Captures timing between key presses.
- Feature Extraction: Converts key events into numerical features.
- Model Training: Learns user behavior using HMM.
- Authentication: Matches new input with the trained pattern.

---

## Relation to Design and Analysis of Algorithms (DAA)

- Algorithmic Design: Applies probabilistic modeling (HMM) to recognize sequential patterns.
- Time & Space Trade-offs: Optimizes authentication performance while balancing model complexity.
- Complexity Analysis: Ensures the approach is feasible for real-time usage scenarios.

---

## Time and Space Complexity

| Component        | Time Complexity      | Space Complexity    |
|------------------|----------------------|---------------------|
| Data Processing  | O(n)                 | O(n)                |
| HMM Training     | O(n * t * k^2)       | O(k^2)              |
| Authentication   | O(t * k^2)           | O(k^2)              |

- n = number of samples, t = time steps (keystrokes), k = HMM states

---

## Installation

### Prerequisites:
Make sure you have Python 3.8+ and pip installed.

### Install Required Packages:
```bash
pip install numpy joblib hmmlearn pynput scikit-learn matplotlib
```

---

## How to Run

### 1. Record Typing Pattern:
```bash
python keystroke_logger.py
```
Type the phrase 4–5 times and press ESC.

### 2. Process Data:
```bash
python process_data.py
```

### 3. Train Model:
```bash
python train_model.py
```

### 4. Authenticate:
```bash
python keystroke_logger.py   # Type the phrase again
python authenticate.py
```

---

## Sample Output

```
Type a phrase (press ESC to end)...
Data saved.
Feature shape: (39, 2)
Model successfully saved as user_model.pkl

Log Likelihood Score: -12.33
User Authenticated
```

---

## Advantages

- Non-intrusive: No hardware needed beyond a keyboard.
- Hard to Mimic: Typing patterns are difficult to reproduce.
- Continuous Authentication: Can run in the background.
- Low Cost: Purely software-based.
- Scalable: Can support many users with individual models.

---

## Real-World Applications

- Secure Login Systems: For banks, universities, and businesses.
- Continuous Session Monitoring: Detect unauthorized access during a session.
- Multi-Factor Authentication (MFA): Acts as a behavioral layer in MFA.
- Remote Exams / Online Proctoring: Ensure test-taker identity.

---

## Cybersecurity Impact

This approach strengthens cybersecurity by adding a behavioral biometric layer to traditional login systems:

- More Secure than Passwords: Even if a password is leaked, the user can't be impersonated easily.
- Hard to Replicate: Unlike fingerprints or face data that can be copied, typing rhythm is dynamic.
- Hacker Resistance: Keyloggers may capture what is typed, but reproducing timing patterns is highly difficult.
- Anomaly Detection: Can flag suspicious behavior patterns even post-login.

---

## Challenges for Hackers

- Behavioral Data Can't Be Stolen Easily: Even if someone records keystrokes, timing variation makes imitation hard.
- Machine Learning Adaptability: The model adapts over time, making static attack patterns ineffective.
- Need for Real-Time Simulation: Hackers would need to recreate the entire timing sequence in real-time, which is extremely difficult.

---

## License

MIT License.

---

## Developed by

Karthik B  
Priyanka G   
Adharsh Ramakrishnan

---

