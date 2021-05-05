/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Classes;

import java.time.LocalDate;

public class Extractor {
    private int id;
    private LocalDate date;
    private String email;

    public Extractor(int id, String date, String email) {
        this.id = id;
        this.date = LocalDate.parse(date);
        this.email = email;
    }

    public int getId() {
        return id;
    }

    public LocalDate getDate() {
        return date;
    }

    public String getEmail() {
        return email;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setDate(String date) {
        this.date = LocalDate.parse(date);
    }

    public void setEmail(String email) {
        this.email = email;
    }
}