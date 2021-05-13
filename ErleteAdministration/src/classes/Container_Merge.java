/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

import java.time.LocalDate;

public class Container_Merge {

    /**
     * The attributes of Container_Merge
     */
    private int id;
    private int capacity;
    private LocalDate date = LocalDate.parse("2001-01-10");
    private LocalDate date2 = LocalDate.parse("2001-01-10");
    private String email = "";

    /**
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
     * @return 
     */
    public int getId() {
        return id;
    }

    public int getCapacity() {
        return capacity;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setCapacity(int capacity) {
        this.capacity = capacity;
    }

    public String getEmail() {
        return email;
    }

    public LocalDate getDate() {
        return date;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setDate(String date) {
        this.date = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }

    public void setDate2(String date) {
        this.date2 = LocalDate.parse(date); //It recieves a String and it converts the String into a LocalDate 
    }

    public LocalDate getDate2() {
        return date2;
    }

    @Override
    public String toString() {
        return "Container_Merge{" + "id=" + id + ", capacity=" + capacity + ", date=" + date + ", email=" + email + '}';
    }

}
