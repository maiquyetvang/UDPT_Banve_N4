package api.model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "Ticket") 
public class Ticket {
	 private int stt;
	 private String gia;
	 private String loaiVe;
	 private String tinhtrang;
	 private String maSk;
	 private String maVe;
	@Id
	 private String id;
	 private String tenSk;
	 private String maKh;
	 private int orderId;

	public String getId() {
		return id;
	}

	public void setId(String id) {
		id = id;
	}
	public int getStt() {
		return stt;
	}

	public void setStt(int stt) {
		this.stt = stt;
	}
	public int getOrderId() {
		return orderId;
	}

	public void setOrderId(int orderId) {
		this.orderId = orderId;
	}

	public String getMaVe() {
		return maVe;
	}

	public void setMaVe(String maVe) {
		this.maVe = maVe;
	}
	public String getGia() {
		return gia;
	}

	public void setGia(String gia) {
		this.gia = gia;
	}

	public String getLoaiVe() {
		return loaiVe;
	}

	public void setLoaiVe(String loaiVe) {
		this.loaiVe = loaiVe;
	}

	public String getTinhtrang() {
		return tinhtrang;
	}

	public void setTinhtrang(String tinhtrang) {
		this.tinhtrang = tinhtrang;
	}

	public String getMaSk() {
		return maSk;
	}

	public void setMaSk(String maSk) {
		this.maSk = maSk;
	}

	public String getTenSk() {
		return tenSk;
	}

	public void setTenSk(String tenSk) {
		this.tenSk = tenSk;
	}

	public String getMaKh() {
		return maKh;
	}

	public void setMaKh(String maKh) {
		this.maKh = maKh;
	}


	public Ticket(String id,int stt, String maVe, String gia, String loaiVe, String tinhtrang, String maSk, String tenSk, String maKh,int orderId) {
		super();
		this.id = id;
		this.stt = stt;
		this.maVe = maVe;
		this.gia = gia;
		this.loaiVe = loaiVe;
		this.tinhtrang = tinhtrang;
		this.maSk = maSk;
		this.tenSk = tenSk;
		this.maKh = maKh;
		this.orderId = orderId;
	}
	public Ticket() {
		super();
	}

}
