#https://medium.com/better-programming/building-your-first-website-with-flask-part-1-903a8b44e806
# helloTest.py
# at the end point / call method hello which returns "hello world"
from flask import Flask

app = Flask(__name__)
#This line creates a new app, which we need for the running process. It also handles all the various task required for the website. __name__ is an automatically defined Python variable, required for making Flask apps.

@app.route("/")
#The syntax above is known as a “decorator”. In Flask, the line added on top of a function description converts it to a “route”. We will go into more detail about what this means shortly.

def hello():
	return 'Hello World!'
#These lines define a function that takes zero parameters and returns the Hello World! string.


if __name__ == '__main__':
	app.run(host='0.0.0.0')

# on running python app.py
# run the flask app
#Line 9 is an if command in Python that implies “run only if the whole code is executed”.
#The other Python variable, __name__, remains as explained above. app.run() mostly runs the variables in line 3 and also on the localhost.
