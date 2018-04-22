import pymysql

def create_user(rit_user, email, display_name):
    ''' Create user in the database and verify '''

    connection = pymysql.connect(host='localhost', port=3307, user='root', password='supersecurepass', db='skitter')

    try:
        with connection.cursor() as cursor:
            print "Trying to add a record"
            sql = "INSERT INTO `users` (`rit_user`,`email`, `display_name`) VALUES (%s, %s, %s)"
            cursor.execute(sql, (rit_user, email, display_name))


        connection.commit()
        print "Successfully added"

        with connection.cursor() as cursor:
            # Read a single record
            sql = "SELECT `rit_user`, `email`, `display_name` FROM `users` WHERE `rit_user`=%s"
            cursor.execute(sql, (rit_user,))
            result = cursor.fetchone()
            print "Printing Record: {0}".format(result)

    except:
        print "Unable to add user to table"

    finally:
        connection.close()

def delete_user(rit_user, email, display_name):
    ''' Delete user in the database and verify '''

    connection = pymysql.connect(host='localhost', port=3307, user='root', password='supersecurepass', db='skitter')

    try:
        with connection.cursor() as cursor:
            print "Trying to delete a record"
            sql = "DELETE FROM `users` WHERE `rit_user`=%s"
            cursor.execute(sql, (rit_user))

        connection.commit()
        

        with connection.cursor() as cursor:
            # Read a single record
            sql = "SELECT `rit_user`, `email`, `display_name` FROM `users` WHERE `rit_user`=%s"
            cursor.execute(sql, (rit_user,))
            result = cursor.fetchone()
            if result == None:
                print "Successfully deleted"

    except:
        print "Unable to delete user from table"

    finally:
        connection.close()

def main():

    rit_user = "user1234"
    email = "user1234@gmail.com"
    display_name = "User 1234"

    create_user(rit_user, email, display_name)
    delete_user(rit_user, email, display_name)

main()
