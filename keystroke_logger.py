from pynput import keyboard
import time
import json

data = []
last_time = None
last_key = None

def on_press(key):
    global last_time, last_key
    try:
        current_time = time.time()
        char = key.char
    except AttributeError:
        return

    if last_time is not None:
        flight_time = current_time - last_time
        data.append({
            'key': last_key,
            'dwell': current_time - last_time,
            'flight': flight_time
        })
    last_time = current_time
    last_key = char

def on_release(key):
    if key == keyboard.Key.esc:

        with open("keystrokes.json", "w") as f:
            json.dump(data, f)
        print("Data saved.")
        return False

print("Type a phrase (press ESC to end)...")
with keyboard.Listener(on_press=on_press, on_release=on_release) as listener:
    listener.join()
