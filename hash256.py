# For command line interface using sha256

import hashlib
print("##################################################")
print("#############REGISTERATION FORM###################")
print("##################################################")
User_Name = input("Enter your name: ")
Email = input("Enter your email address: ")
Password = input("Enter you password: ")  # take input form the database
p_encode = hashlib.sha256(Password.encode())  # convert string to bytes
p_encrypt = p_encode.hexdigest()  # return encoded data to hex format
print("The hashed password is:", p_encrypt)


print("##################################################")
print("####################LOGIN FORM####################")
print("##################################################")
email = input("Enter your email address: ")
password = input("Enter you password: ")
p = hashlib.sha256(password.encode())  # encode the password
if Email == email and p.hexdigest() == p_encrypt:
    print("LOGIN SUCCESSFUL")
else:
    print("WRONG CREDENTIALS")

