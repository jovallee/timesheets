from flask import Flask, jsonify, make_response, abort
from flask_httpauth import HTTPBasicAuth
import yaml
import mysql.connector
from mysql.connector import errorcode
from datetime.DateTime import datetime
from datetime import timedelta

app = Flask(__name__)
auth = HTTPBasicAuth()


@app.route('/timesheets/api/v1.0/employes', methods=['GET'])
@auth.login_required
def get_employes():

    with open('api_config.yaml', 'rb') as f:
        config = yaml.load(f)
    try:
        conn = mysql.connector.connect(**config)
        cursor = conn.cursor()
        query = 'Select * from profil_employe'
        cursor.execute(query)

        results = {}
        for (id, nom, prenom, titre, taux_horaire, numero_porte, rue, appartement, code_postal, numero_tel, courriel,
            is_admin, password) in cursor:
                results[id] = {'id': id, 'nom': nom, 'prenom': prenom, 'titre': titre, 'taux_horaire': taux_horaire,
                               'numero_porte': numero_porte, 'rue': rue, 'appartement': appartement,
                               'code_postal': code_postal, 'numero_tel': numero_tel, 'courriel': courriel,
                               'is_admin': is_admin}
        return jsonify({'employes': results})

    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exists")
        else:
            print(err)


@app.route('/timesheets/api/v1.0/employes/<int:emp_id>', methods=['GET'])
@auth.login_required
def get_employee(emp_id):
    with open('api_config.yaml', 'rb') as f:
        config = yaml.load(f)
    try:
        conn = mysql.connector.connect(**config)
        cursor = conn.cursor()
        query = 'Select * from profil_employe where id =' + str(emp_id)
        cursor.execute(query)
        results = {}
        for (id, nom, prenom, titre, taux_horaire, numero_porte, rue, appartement, code_postal, numero_tel, courriel,
            is_admin, password) in cursor:
                results[id] = {'id': id, 'nom': nom, 'prenom': prenom, 'titre': titre, 'taux_horaire': taux_horaire,
                               'numero_porte': numero_porte, 'rue': rue, 'appartement': appartement,
                               'code_postal': code_postal, 'numero_tel': numero_tel, 'courriel': courriel,
                               'is_admin': is_admin}
        if len(results) == 0:
            abort(404)
        return jsonify({'employe_': results})

    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exists")
        else:
            print(err)


@app.route('/timesheets/api/v1.0/auth/<emp_email>')
@auth.login_required
def get_password(emp_email):
    with open('api_config.yaml', 'rb') as f:
        config_bd = yaml.load(f)
    try:
        conn = mysql.connector.connect(**config_bd)
        cursor = conn.cursor()
        query = 'Select id, password from profil_employe where courriel ="' + emp_email + '"'
        cursor.execute(query)
        results = {}
        for (this_id, password) in cursor:
            results['id'] = this_id
            results['password'] = password

        if len(results) == 0:
            abort(404)
        return jsonify(results)

    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exists")
        else:
            print(err)


@app.route('/timesheets/api/v1.0/projets', methods=['GET'])
@auth.login_required
def get_projects():
    with open('api_config.yaml', 'rb') as f:
        config_bd = yaml.load(f)
    try:
        conn = mysql.connector.connect(**config_bd)
        cursor = conn.cursor()

        # Only open projects
        query = 'Select id, nom from projets where statut = 1'
        cursor.execute(query)
        results = {}
        for (this_id, nom) in cursor:
            results[this_id] = nom

        if len(results) == 0:
            abort(404)
        return jsonify(results)

    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exists")
        else:
            print(err)


@app.route('/timesheets/api/v1.0/timesheets/<emp_id>/<beg_date>', methods=['GET'])
@auth.login_required
def return_timesheets_details_for_week(emp_id, beg_date):
    # with open('api_config.yaml', 'rb') as f:
    #     config_bd = yaml.load(f)
    # try:
    #     conn = mysql.connector.connect(**config_bd)
    #     cursor = conn.cursor()
    #
    #     formatted_date = datetime(beg_date)
    #     query = 'Select date, projet_id, heure_deb, heure_fin, temps_pause, temps_total, note from timesheets where date >=' + formatted_date + 'and date <=' + formatted_date + \
    #             timedelta(days=6) + 'and emp_id=' + emp_id
    #
    #     cursor.execute(query)
    #     results = {}
    #     for (this_id, nom) in cursor:
    #         results[this_id] = nom
    #
    #     if len(results) == 0:
    #         abort(404)
    #     return jsonify(results)
    #
    # except mysql.connector.Error as err:
    #     if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
    #         print("Something is wrong with your user name or password")
    #     elif err.errno == errorcode.ER_BAD_DB_ERROR:
    #         print("Database does not exists")
    #     else:
    #         print(err)
    pass


@app.errorhandler(404)
def not_found(error):
    return make_response(jsonify({'error': 'Not found'}), 404)

@auth.get_password
def get_password(username):
    if username == '4my3QHAjK2QpAGUXKREnpzdVunzx':
        return 'Y2Qex9hrR9kEPBWtPQwCeqfqPRCe'
    return None

@auth.error_handler
def unauthorized():
    return make_response(jsonify({'error': 'Unauthorized access'}), 401)


if __name__ == '__main__':
    app.run(debug=True)
