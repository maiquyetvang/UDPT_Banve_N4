package api.controller;

public class PaymentQueryRequest {
    private String order_id;
    private String trans_date;

    // Constructors
    public PaymentQueryRequest() {
    }

    public PaymentQueryRequest(String order_id, String trans_date) {
        this.order_id = order_id;
        this.trans_date = trans_date;
    }

    // Getters và Setters
    public String getOrder_id() {
        return order_id;
    }

    public void setOrder_id(String order_id) {
        this.order_id = order_id;
    }

    public String getTrans_date() {
        return trans_date;
    }

    public void setTrans_date(String trans_date) {
        this.trans_date = trans_date;
    }
}
