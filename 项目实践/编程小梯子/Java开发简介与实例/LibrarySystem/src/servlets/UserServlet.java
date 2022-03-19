package servlets;

import java.io.IOException;
import java.sql.SQLException;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import Dao.UserDao;
import models.User;

/**
 * Servlet implementation class UserServlet
 */
public class UserServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public UserServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		
		String path="/index.jsp";
		
		path=login(request);
		request.getRequestDispatcher(path).forward(request,response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		
	}
	 public String  login(HttpServletRequest request) {
	        String msg = "";//表示提示信息
	        String url = "";//表示跳转路径
	        //取得页面中传递过来的数据
	        String aid = request.getParameter("aid");
	        String password = request.getParameter("password");
	        System.out.println(aid+","+password);
	        //判断用户名或者密码是否为空
	        if(aid.equals(null)||password.equals(null))
	        {
	        	msg="用户名或者密码为空,请重新输入！";
	        	url="/index.jsp";
	        }else {
	        	//在数据库中查询用户是否存在
		        UserDao userdao;
		        User user=null;
				try {
					userdao = new UserDao();
					user=userdao.getUserById(aid);
					System.out.println(user);
					//如果用户名错误
					if(user==null)
					{
						msg="用户名错误,请重新输入!";
						url="/index.jsp";
					}else
					{
						//如果用户名不正确
						if(!user.getPassword().equals(password))
						{
							msg="密码错误，请重新输入！";
							url="/index.jsp";
						}else {
							msg="用户"+aid+",欢迎您使用系统！";
							url="/loginsuccess.jsp";	
						}
					} 
				} catch (ClassNotFoundException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (SQLException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} 
	        }
	        request.setAttribute("msg", msg);
	        return url;
	        
	        
	 }

}
