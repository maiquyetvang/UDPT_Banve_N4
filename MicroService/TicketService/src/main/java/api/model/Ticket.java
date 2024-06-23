package api.model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "Ticket") 
public class Ticket {

	@Id
	 private String maVe; 
	 private String tenVe;
	 private String moTa; 
	 private String gia; 
	 private String loaiVe; 
	 private int tongSoVe;
	 private String maSk;
	 private String maKh;
	    
	 public String getMaSk() { 
	  return maSk; 
	 } 
	 public void setMaSk(String maSk) { 
	  this.maSk = maSk; 
	 } 
	 public String getMaKh() { 
		  return maKh; 
		 } 
		 public void setMaKh(String maKh) { 
		  this.maKh = maKh; 
		 } 
	    // Getter for ten
	    public String getTenVe() {
	        return tenVe;
	    }

	    // Setter for ten
	    public void setTenVe(String tenVe) {
	        this.tenVe = tenVe;
	    }

	    // Getter for moTa
	    public String getMoTa() {
	        return moTa;
	    }

	    // Setter for moTa
	    public void setMoTa(String moTa) {
	        this.moTa = moTa;
	    }

	    // Getter for mave
	    public String getMaVe() {
	        return maVe;
	    }

	    // Setter for mave
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

	      public int getTongSoVe() {
	        return tongSoVe;
	      }

	      public void setTongSoVe(int tongSoVe) {
	        this.tongSoVe = tongSoVe;
	      }
	    // Producer method to create an Event object
	    public Ticket(String maVe, String tenVe, String moTa, String gia, String loaiVe, int tongSoVe, String maSk, String maKh) {
	        super();
	        this.maVe = maVe;
	        this.tenVe = tenVe;
	        this.moTa = moTa;
	        this.gia = gia;
	        this.loaiVe = loaiVe;
	        this.tongSoVe = tongSoVe;
	        this.maSk = maSk;
	        this.maKh = maKh;
	    }
	    
	    public Ticket() { 
	    			 super(); 
	    		 } 


	

}
