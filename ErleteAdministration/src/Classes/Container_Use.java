/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

import java.time.LocalDate;

/**
 *
 * @author USAURIO
 */
public class Container_Use {
    private LocalDate date;
    private String email;
    private int container;

    public Container_Use(String date, String email, int container) {
        this.date = LocalDate.parse(date);
        this.email = email;
        this.container = container;
    }

    public LocalDate getDate() {
        return date;
    }

    public String getEmail() {
        return email;
    }

    public int getContainer() {
        return container;
    }

    public void setDate(String date) {
        this.date = LocalDate.parse(date);
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setContainer(int container) {
        this.container = container;
    }
    
    
}
