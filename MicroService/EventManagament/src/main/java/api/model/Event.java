package api.model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "Event2")
public class Event {

    @Id
    private String maSk;
    private String ten;
    private String moTa;
    private String thoiLuong;
    private String diaChi;
    private int tongSoVe;
    private String tinhTrang;
    private String maAdSk;
    private String imageData;

    public String getImageData() {
        return imageData;
    }

    public void setImageData(String imageData) {
        this.imageData = imageData;
    }

    public String getMaSk() {
        return maSk;
    }

    public void setMaSk(String maSk) {
        this.maSk = maSk;
    }

    public String getTen() {
        return ten;
    }

    public void setTen(String ten) {
        this.ten = ten;
    }

    public String getMoTa() {
        return moTa;
    }

    public void setMoTa(String moTa) {
        this.moTa = moTa;
    }

    public String getThoiLuong() {
        return thoiLuong;
    }

    public void setThoiLuong(String thoiLuong) {
        this.thoiLuong = thoiLuong;
    }

    public String getDiaChi() {
        return diaChi;
    }

    public void setDiaChi(String diaChi) {
        this.diaChi = diaChi;
    }

    public int getTongSoVe() {
        return tongSoVe;
    }

    public void setTongSoVe(int tongSoVe) {
        this.tongSoVe = tongSoVe;
    }

    public String getTinhTrang() {
        return tinhTrang;
    }

    public void setTinhTrang(String tinhTrang) {
        this.tinhTrang = tinhTrang;
    }

    public String getMaAdSk() {
        return maAdSk;
    }

    public void setMaAdSk(String maAdSk) {
        this.maAdSk = maAdSk;
    }


    public Event(String maSk, String ten, String moTa, String thoiLuong, String diaChi, int tongSoVe, String tinhTrang, String maAdSk,String imageData) {
        super();
        this.maSk = maSk;
        this.ten = ten;
        this.moTa = moTa;
        this.thoiLuong = thoiLuong;
        this.diaChi = diaChi;
        this.tongSoVe = tongSoVe;
        this.tinhTrang = tinhTrang;
        this.maAdSk = maAdSk;
        this.imageData = imageData;
    }

    public Event() {
        super();
    }
}
