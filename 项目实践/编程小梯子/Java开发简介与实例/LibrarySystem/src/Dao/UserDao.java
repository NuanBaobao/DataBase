package Dao;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import models.User;

public class UserDao {
    private  static Connection conn=null;
    private  static Statement  stmt=null;
    
	public UserDao() throws ClassNotFoundException, SQLException
	{
		 conn=Connect.getConnection();
	}
	
	//通过id检索用户
	public static User  getUserById(String id)
	{
		//要特别注意字符串需要加单引号
		String sql="select * from  user  where userid='"+id+"'";
		 User user=null;
		try {
			stmt = conn.createStatement();
		    ResultSet rs = stmt.executeQuery(sql);    
	    
	        // 展开结果集数据库
	        while(rs.next()){
	            // 通过字段检索
	        	user=new User();
	            user.setUserid(rs.getString("userid"));
	            user.setUsername(rs.getString("username"));
	            user.setPassword(rs.getString("password"));
	        }
	        // 完成后关闭
	        rs.close();
	        stmt.close();
	        conn.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
       
        
        return user;
		
	}
	
}
