/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

import java.time.LocalDate;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Container_Merge {

    /**
     * 
     * The attributes of Container_Merge
     */
    private int id;
    private int capacity;
    private LocalDate date = LocalDate.parse("2001-01-10");
    private LocalDate date2 = LocalDate.parse("2001-01-10");
    private String email = "";

    /**
     * 
     * The constructor of Container_Merge
     *
     * This class is going to save the id and the capacity of each container,
     * and when and who is using them
     *
     * @param id
     * @param capacity
     * @param email
     * @param date
     * @param date2
     */
    public Container_Merge(int id, int capacity, String email, String date, String date2) {
        this.id = id;
        this.capacity = capacity;
        this.date = LocalDate.parse(date);
        this.date2 = LocalDate.parse(date2);
        this.email = email;
    }

    /**
     * 
     * Other constructor of Container_Merge
     * 
     * This class is going to save the id and the capacity of each container
     * 
     * @param id
     * @param capacity 
     */
    public Container_Merge(int id, int capacity) {
        this.id = id;
        this.capacity = capacity;
    }

    /**
     * 
     * @return the id of the Container
     */
    public int getId() {
        return id;
    }

    /**
     * 
     * @return the capacity of the Container
     */
    public int getCapacity() {
        return capacity;
    }

    /**
     * 
     * @return the email of the User who is using the can
     */
    public String getEmail() {
        return email;
    }

    /**
     * 
     * @return the start date when the can has being used
     */
    public LocalDate getDate() {
        return date;
    }
    
    /**
     * 
     * @return the end date when the can has being used
     */
    public LocalDate getDate2() {
        return date2;
    }
    
    /**
     * 
     * Changes the id of the Container
     * 
     * @param id 
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * 
     * Changes the capacity of the Container
     * 
     * @param capacity 
     */
    public void setCapacity(int capacity) {
        this.capacity = capacity;
    }
    
    /**
     * 
     * Changes the email of the User who is using the can
     * 
     * @param email 
     */
    public void setEmail(String email) {
        this.email = email;
    }

    /**
     * 
     * Changes the start date when the can has being used
     * 
     * @param date 
     */
    public void setDate(String date) {
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }

    /**
     * 
     * Changes the end date when the can has being used
     * 
     * @param date 
     */
    public void setDate2(String date) {
        this.date2 = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }
    
    /**
     * 
     * Proves if the email has an at sign
     * @param mail
     * @return 1 if the email has a correct format and 0 if not
     */
    public boolean isCorrectEmail(String mail) {
        Pattern pat = Pattern.compile("^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@"
                + "[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
        Matcher mather = pat.matcher(mail);
        return mather.find();
    }
    
    /**
     * 
     * @return a String with all the attributes
     */
    @Override
    public String toString() {
        return "Container_Merge{" + "id=" + id + ", capacity=" + capacity + ", date=" + date + ", email=" + email + '}';
    }

}
