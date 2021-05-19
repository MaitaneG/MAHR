/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package information;

public class Container {

    /**
     * 
     * Attributes of Container
     */
    private int id;
    private int capacity;

    /**
     * 
     * The constructor of Container
     *
     * This class is going to save an id and the capacity of each container
     * 
     * @param id
     * @param capacity
     */
    public Container(int id, int capacity) {
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
}
