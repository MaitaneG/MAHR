/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

import java.time.LocalDate;

public class Container_Merge {
    private int id;
    private int capacity;
    private LocalDate date;
    private String email;

    public Container_Merge(int id, int capacity, String date, String email) {
        this.id = id;
        this.capacity = capacity;
        this.date = LocalDate.parse(date);
        this.email = email;
    }

    public int getId() {
        return id;
    }

    public int getCapacity() {
        return capacity;
    }
    
    public String getEmail() {
        return email;
    }
    
    public LocalDate getDate() {
        return date;
    }
    
    public void setId(int id) {
        this.id = id;
    }

    public void setCapacity(int capacity) {
        this.capacity = capacity;
    }

    public void setEmail(String email) {
        this.email = email;
    }
    
    public void setDate(String date) {
        this.date = LocalDate.parse(date);
    }
}