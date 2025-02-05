import logging

class Logger:
    def __init__(self):
        logging.basicConfig(filename='daemon/logs/daemon.log', level=logging.INFO)

    def log(self, message):
        logging.info(message)
