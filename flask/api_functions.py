from flask import Flask, request
import re, pymysql

app = Flask(__name__)

def sanitize(user_query):

    clean_string = re.escape(user_query)

    return clean_string


@app.route("/")
def hello():
  return "Follow/Unfollow API"


@app.route("/UserSearch", methods=['POST'])
def user_search():

    if request.form['search']:
        return("GOT EM")
    search_query = sanitize(request.args.get('search'))

    if len(search_query) > 0:

        result = "False - No users match your request"

        connection = pymysql.connect(host='database',
                                    user='root',
                                        password='supersecurepass',
                                        db='skitter',
                                        charset='utf8mb4',
                                        cursorclass=pymysql.cursors.DictCursor)
        

        try:
            with connection.cursor() as cursor:
                sql_query = "SELECT rit_user FROM users WHERE rit_user LIKE %s"
                cursor.execute(sql_query, ('%' + search_query + '%'))
                foundUsers = cursor.fetchall()
                
                result = ""

                for user in foundUsers:
                    result += str(user['rit_user']) + "\n"

        finally:
            connection.close()

        return(result)

    else:
        return "You did not enter a valid query"


@app.route("/FollowUser", methods=['GET'])
def follow_user():

    influencer = sanitize(request.args.get('follow'))
    follower = "lxc6101"

    if len(influencer) > 0:

        if influencer != follower:

            connection = pymysql.connect(host='database',
                                        user='root',
                                            password='supersecurepass',
                                            db='skitter',
                                            charset='utf8mb4',
                                            cursorclass=pymysql.cursors.DictCursor)
            

            try:
                with connection.cursor() as cursor:

                    sql_query = "INSERT INTO follows VALUES (%s, %s)"
                    cursor.execute(sql_query, (influencer, follower,))
                    connection.commit()
            except:
                return("False - Unable to follow user")

            finally:
                connection.close()

            return("True - Followed user")
        
        else:
            return "You cannot follow yourself"

    else:
        return "You did not enter a valid query"


@app.route("/UnfollowUser", methods=['GET'])
def unfollow_user():

    influencer = sanitize(request.args.get('unfollow'))
    follower = "lxc6101"

    if len(influencer) > 0:

        if influencer != follower:

            connection = pymysql.connect(host='database',
                                        user='root',
                                            password='supersecurepass',
                                            db='skitter',
                                            charset='utf8mb4',
                                            cursorclass=pymysql.cursors.DictCursor)
            

            try:
                with connection.cursor() as cursor:

                    sql_query = "DELETE FROM follows WHERE influencer = %s AND follower = %s"
                    cursor.execute(sql_query, (influencer, follower,))
                    connection.commit()

            except:
                return("False - Unable to unfollow user")

            finally:
                connection.close()

            return("True - Unfollowed user")
        
        else:
            return "You cannot unfollow yourself"

    else:
        return "You did not enter a valid query"


if __name__ == "__main__":
  app.run(host= '0.0.0.0')