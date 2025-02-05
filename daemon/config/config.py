import os

# PID_FILE = '/tmp/daemon.pid' # Linux
PID_FILE = os.path.join(os.getcwd(), 'daemon\\config\\daemon.pid')  # Windows