
#Importamos la libreria de flask
from flask import Flask, render_template, redirect

#Creamos una insatancia del proyecto
app = Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"] = True

#Creación de rutas
@app.route("/")

#Crear una funcion que se llame home
def home():
    #Retornar un mensaje
    return render_template("Index.html")

#Retorna un mensaje
@app.route("/guardar")
def guardar():
    return "producto guardado correctamente"

#Retrona una vista HTML. Usamos render_template
@app.route("/login")
def login():
    return render_template("login.html")

#Redericcionamos a otra ruta. Usamos redirect
@app.route("/logout")
def logout():
    return redirect("/login")

#Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port = 5000)
