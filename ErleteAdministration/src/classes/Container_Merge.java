/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package classes;

import java.time.LocalDate;

/**
 *
 * @author moreno.manuel
 */
public class Container_Merge {
    
    private int id;
    private int capacity;
    private LocalDate date = LocalDate.parse("2001-01-10");
    private LocalDate date2 = LocalDate.parse("2001-01-10");
    private String email = "";
    
    public Container_Merge(int id, int capacity, String email, String date, String date2) {
        this.id = id;
        this.capacity = capacity;
        this.date = LocalDate.parse(date);
        this.date2 = LocalDate.parse(date2); 
        this.email = email;
    }
    
    public Container_Merge(int id, int capacity) {
        this.id = id;
        this.capacity = capacity;
    }
    
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
