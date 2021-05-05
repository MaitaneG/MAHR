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
public class Account {
    private int id;
    private String payer;
    private String collector;
    private LocalDate date;
    private float amount;
    private float total;

    public Account(int id, String payer, String collector, String date, float amount, float total) {
        this.id = id;
        this.payer = payer;
        this.collector = collector;
        this.date = LocalDate.parse(date);
        this.amount = amount;
        this.total = total;
    }

    public int getId() {
        return id;
    }

    public String getPayer() {
        return payer;
    }

    public String getCollector() {
        return collector;
    }

    public LocalDate getDate() {
        return date;
    }

    public float getAmount() {
        return amount;
    }

    public float getTotal() {
        return total;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setPayer(String payer) {
        this.payer = payer;
    }

    public void setCollector(String collector) {
        this.collector = collector;
    }

    public void setDate(LocalDate date) {
        this.date = date;
    }

    public void setAmount(float amount) {
        this.amount = amount;
    }

    public void setTotal(float total) {
        this.total = total;
    }
}
