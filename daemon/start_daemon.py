import os

from config.config import PID_FILE
from modules.daemon import Daemon

def run():
    try:
        with open(PID_FILE, 'w') as pid_file:
            pid_file.write(str(os.getpid()))
        print(f"PID écrit dans {PID_FILE}")

        daemon = Daemon()
        daemon.run()

    except Exception as e:
        print(f"Erreur lors du lancement du daemon : {e}")

if __name__ == "__main__":
    run()