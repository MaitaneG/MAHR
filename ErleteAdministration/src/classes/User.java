/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

public class User {

    /**
     * The attributes of the User
     */
    private String dni;
    private String name;
    private String surname;
    private String email;
    private String password;
    private String account;
    private boolean type;

    /**
     * The constructor of User
     *
     * In this class we are going to use the DNI, the name, the surname, the
     * email (the user is going to use to log in ), the password (the user is
     * going to use to log in), the bank account and if it is administrator or
     * not
     *
     * @param dni
     * @param name
     * @param surname
     * @param email
     * @param password
     * @param account
     * @param type
     */
    public User(String dni, String name, String surname, String email, String password, String account, boolean type) {
        this.dni = dni;
        this.name = name;
        this.surname = surname;
        this.email = email;
        this.password = password;
        this.account = account;
        this.type = type;
    }

    /**
     *
     * @return the DNI of the User
     */
    public String getDni() {
        return dni;
    }

    /**
     *
     * @return the name of the User
     */
    public String getName() {
        return name;
    }

    /**
     *
     * @return the surname of the User
     */
    public String getSurname() {
        return surname;
    }

    /**
     *
     * @return the email of the User
     */
    public String getEmail() {
        return email;
    }

    /**
     * 
     * @return the password of the User
     */
    public String getPassword() {
        return password;
    }

    /**
     * 
     * @return the bank account of the User
     */
    public String getAccount() {
        return account;
    }

    /**
     * 
     * @return if the user is administrator or not
     */
    public boolean isType() {
        return type;
    }

    /**
     * Changes the DNI of the User
     * @param dni 
     */
    public void setDni(String dni) {
        this.dni = dni;
    }

    /**
     * Changes the name of the User
     * @param name 
     */
    public void setName(String name) {
        this.name = name;
    }

    /**
     * Changes the surname of the User
     * @param surname 
     */
    public void setSurname(String surname) {
        this.surname = surname;
    }

    /**
     * Changes the email of the User
     * @param email 
     */
    public void setEmail(String email) {
        this.email = email;
    }

    /**
     * Changes the password of the User
     * @param password 
     */
    public void setPassword(String password) {
        this.password = password;
    }

    /**
     * Changes the bank account of the User
     * @param account 
     */
    public void setAccount(String account) {
        this.account = account;
    }

    /**
     * Changes if the User is administrator or not
     * @param type 
     */
    public void setType(boolean type) {
        this.type = type;
    }
}
