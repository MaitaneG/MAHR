/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

import java.time.LocalDate;

public class Container_Use {

    /**
     * The attributes of Container_Use
     */
    private LocalDate date;
    private String email;
    private int container;

    /**
     * The constructor of Container_Use
     *
     * In this class we are going to save an id, the id of the container and the
     * date where the container has started being used
     *
     * @param email
     * @param container
     * @param date
     */
    public Container_Use(String email, int container, String date) {
        this.email = email;
        this.container = container;
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }

    /**
     *
     * @return the email of Container_Use
     */
    public String getEmail() {
        return email;
    }

    /**
     *
     * @return the id of the Container it has been used in Container_Use
     */
    public int getContainer() {
        return container;
    }

    /**
     *
     * @return the date of the Container_Use
     */
    public LocalDate getDate() {
        return date;
    }

    /**
     * Changes the email of Container_Use
     *
     * @param email
     */
    public void setEmail(String email) {
        this.email = email;
    }

    /**
     * Changes the id of the Container it has been used in Container_Use
     *
     * @param container
     */
    public void setContainer(int container) {
        this.container = container;
    }

    /**
     * Changes the date of the Container_Use
     *
     * @param date
     */
    public void setDate(String date) {
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }
}
