package book;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Connection;
import java.util.ArrayList;

import com.opensymphony.xwork2.ActionSupport;

public class BookAction extends ActionSupport {
	private DBConnection bookConnection = new DBConnection();
	private String username = "hehe";
	private String password;
	private String errorMessage;
	private String listname;
	private ArrayList<String> answer = new ArrayList<String>();
	private ArrayList<String> list = new ArrayList<String>();
	private String question1, question2, question3, question4, question5,
			question6;
	private String answer1, answer2, answer3, answer4, answer5, answer6;
	public String atMeAnswerList() throws Exception {
		try {
			String searchListString = "select * from callon where username = ?";
			Connection tempConnection = bookConnection.getConnection();
			PreparedStatement searchListPreparedStatement = tempConnection
					.prepareStatement(searchListString);
			searchListPreparedStatement.setString(1, username);
			ResultSet tempSet = searchListPreparedStatement.executeQuery();
			if (tempSet.next()) {
				list.clear();
				String tempString=new String();
				do{
					tempString=tempSet.getString("listname");
					list.add(tempString);
					}while(tempSet.next());
				errorMessage="@你的题单";
			} else {
				errorMessage="没有@你的题单";
			}
		} catch (Exception e) {
			errorMessage = "fail in atMeAnswerList";
			System.out.println("fail in atMeAnswerList");
			throw e;
		}
		return SUCCESS;
	}

	private void userEstablishList(String user, String list) {
		try {
			String searchUserString = "select * from users where username = ?";
			String updateString = "update users set questionlists = ? where username = ?";
			String establishListString = "insert into listcreator (listname,creator) values (?,?)";
			Connection tempConnection = bookConnection.getConnection();
			PreparedStatement searchUserPreparedStatement = tempConnection
					.prepareStatement(searchUserString);
			PreparedStatement updatePreparedStatement = tempConnection
					.prepareStatement(updateString);
			PreparedStatement establishListPreparedStatement = tempConnection
					.prepareStatement(establishListString);
			searchUserPreparedStatement.setString(1, user);
			ResultSet tempSet = searchUserPreparedStatement.executeQuery();
			if (tempSet.next()) {
				StringBuilder tempString = new StringBuilder(
						tempSet.getString("questionlists"));
				tempString.append("." + list);
				updatePreparedStatement.setString(1, tempString.toString());
				updatePreparedStatement.setString(2, user);
				updatePreparedStatement.executeUpdate();
				establishListPreparedStatement.setString(1, list);
				establishListPreparedStatement.setString(2, user);
				establishListPreparedStatement.executeUpdate();
			}
		} catch (Exception e) {
			errorMessage = "fail in userEstablishList";
			System.out.println("fail in userEstablishList");
		}
	}

	public String establishMyList() {
		// *************************************************************************************
		list.clear();
		answer.clear();
		list.add(question1);
		list.add(question2);
		list.add(question3);
		list.add(question4);
		list.add(question5);
		list.add(question6);
		answer.add(answer1);
		answer.add(answer2);
		answer.add(answer3);
		answer.add(answer4);
		answer.add(answer5);
		answer.add(answer6);
		/*
		 * System.out.println("question");
		 * System.out.println(question1+question1.length());
		 * System.out.println(question2+question2.length());
		 * System.out.println(question3+question3.length());
		 * System.out.println(question4+question4.length());
		 * System.out.println(question5+question5.length());
		 * System.out.println(question6+question6.length());
		 * System.out.println("answer");
		 * System.out.println(answer1+answer1.length());
		 * System.out.println(answer2+answer2.length());
		 * System.out.println(answer3+answer3.length());
		 * System.out.println(answer4+answer4.length());
		 * System.out.println(answer5+answer5.length());
		 * System.out.println(answer6+answer6.length());
		 */
		// *************************************************************************************
		try {
			String searchString = "select * from questions where listname = ?";
			// String
			// searchQuestionString="select * from questions where question = ?";
			String addQuestionString = "insert into questions (listname,question,answer) values (?,?,?)";
			Connection tempConnection = bookConnection.getConnection();
			PreparedStatement searchstmt = tempConnection
					.prepareStatement(searchString);
			searchstmt.setString(1, listname);
			ResultSet tempSet = searchstmt.executeQuery();
			if (tempSet.next()) {
				errorMessage = "题单名已存在";
			} else {
				String questionString = new String();
				String answerString = new String();
				System.out.println("list.size=" + list.size());
				System.out.println("answer.size=" + answer.size());
				for (int i = 0; i < list.size() && i < answer.size(); i++) {
					System.out.println("i=" + i);
					questionString = list.get(i);
					answerString = answer.get(i);
					System.out.println("i=" + i);
					if (questionString.length() != 0
							&& answerString.length() != 0) {
						System.out.println("i=" + i);
						// PreparedStatement
						// searchQuestionstmt=tempConnection.prepareStatement(searchQuestionString);
						// searchQuestionstmt.setString(1, tempString);
						// ResultSet
						// questionResultSet=searchQuestionstmt.executeQuery();
						// if(questionResultSet.next())
						// {
						// errorMessage="问题"+(i+1)+"已存在";
						// break;
						// }
						// else {
						PreparedStatement addQuestionstmt = tempConnection
								.prepareStatement(addQuestionString);
						addQuestionstmt.setString(1, listname);
						addQuestionstmt.setString(2, questionString);
						addQuestionstmt.setString(3, answerString);
						System.out.println("i=" + i);
						addQuestionstmt.executeUpdate();
						System.out.println("i=" + i);
						addQuestionstmt.close();
						// }
						// searchQuestionstmt.close();
						// questionResultSet.close();
					}
				}
				userEstablishList(username, listname);
				errorMessage = "添加题单成功";
				System.out.println("succeed");
			}
			// **********************************************************************
			System.out.println("listname:" + listname);
			for (int i = 0; i < list.size(); i++) {
				System.out.println("question:" + list.get(i));
				System.out.println("answer:" + answer.get(i));
			}
			System.out.println("username:" + username);
			// *******************************************************************************
		} catch (Exception e) {
			errorMessage = "establish fail";
			System.out.println("fail in establish");
		}
		return SUCCESS;
	}

	public String signup() {
		if (username.indexOf(".") != -1 || username.indexOf("/") != -1) {
			errorMessage = "用户名中不能有点号或斜杠";
		} else {
			try {
				String searchString = "select * from users where username = ?";
				String signupString = "insert into users (username,password,questionlists,answerlists) values (?,?,?,?)";
				Connection tempConnection = bookConnection.getConnection();
				PreparedStatement searchstmt = tempConnection
						.prepareStatement(searchString);
				searchstmt.setString(1, username);
				ResultSet tempSet = searchstmt.executeQuery();
				if (tempSet.next()) {
					errorMessage = "用户名已存在";
				} else {
					PreparedStatement signupstmt = tempConnection
							.prepareStatement(signupString);
					signupstmt.setString(1, username);
					signupstmt.setString(2, password);
					signupstmt.setString(3, "");
					signupstmt.setString(4, "");
					signupstmt.executeUpdate();
					errorMessage = "用户添加成功";
					System.out.print("succeed");
				}
			} catch (Exception e) {
				errorMessage = "signup fail";
				System.out.println("fail in signup");
			}
		}

		return SUCCESS;
	}

	public String searchQuestionList() {
		try {
			Connection tempConnection = bookConnection.getConnection();
			String searchquestionString = "select * from questions where listname = ?";
			PreparedStatement searchquestionstmt = tempConnection
					.prepareStatement(searchquestionString);
			searchquestionstmt.setString(1, listname);
			ResultSet tempSet = searchquestionstmt.executeQuery();
			if (tempSet.next()) {
				list.clear();
				answer.clear();
				String tempString = new String();
				do {
					tempString = tempSet.getString("question");
					list.add(tempString);
					tempString = tempSet.getString("answer");
					answer.add(tempString);
				} while (tempSet.next());
				errorMessage = "List found";
			} else {
				errorMessage = "no this list";
				System.out.print("not find list");
			}
		} catch (Exception e) {
			errorMessage = "finding the list fail";
			System.out.println("fail in finding question list");
		}
		return SUCCESS;
	}

	public String seeMyQuestionList() {
		list.clear();
		try {
			String searchString = "select * from users where username = ?";
			Connection tempConnection = bookConnection.getConnection();
			PreparedStatement searchstmt = tempConnection
					.prepareStatement(searchString);
			searchstmt.setString(1, username);
			ResultSet tempSet = searchstmt.executeQuery();
			if (tempSet.next()) {
				String temp = tempSet.getString("questionlists");
				System.out.println("heh");
				System.out.println(temp);
				String[] setStrings = temp.split("\\.");
				System.out.println(setStrings.length);
				for (String s : setStrings) {
					System.out.println(s);
					list.add(s);
				}
			} else {
				errorMessage = "no this user";
				System.out.print("no this user");
			}
		} catch (Exception e) {
			errorMessage = "finding question list fail";
			System.out.println("fail in finding question list");
		}
		return SUCCESS;
	}

	public String login() {
		try {
			String loginString = "select * from users where username = ? and password = ?";
			Connection tempConnection = bookConnection.getConnection();
			PreparedStatement loginstmt = tempConnection
					.prepareStatement(loginString);
			loginstmt.setString(1, username);
			loginstmt.setString(2, password);
			ResultSet tempSet = loginstmt.executeQuery();
			if (tempSet.next()) {
				errorMessage = "login succeed";
				return "success";
			} else {
				errorMessage = "wrong username or password";
				System.out.print("wrong username or password");
				return "fail";
			}
		} catch (Exception e) {
			errorMessage = "login fail";
			System.out.println("fail in login");
			return "fail";
		}
	}

	public ArrayList<String> getAnswer() {
		return answer;
	}

	public void setAnswer(ArrayList<String> answer) {
		this.answer = answer;
	}

	public String getListname() {
		return listname;
	}

	public void setListname(String listname) {
		this.listname = listname;
	}

	public ArrayList<String> getList() {
		return list;
	}

	public void setList(ArrayList<String> list) {
		this.list = list;
	}

	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getErrorMessage() {
		return errorMessage;
	}

	public void setErrorMessage(String errorMessage) {
		this.errorMessage = errorMessage;
	}

	public String getQuestion1() {
		return question1;
	}

	public void setQuestion1(String question1) {
		this.question1 = question1;
	}

	public String getQuestion2() {
		return question2;
	}

	public void setQuestion2(String question2) {
		this.question2 = question2;
	}

	public String getQuestion3() {
		return question3;
	}

	public void setQuestion3(String question3) {
		this.question3 = question3;
	}

	public String getQuestion4() {
		return question4;
	}

	public void setQuestion4(String question4) {
		this.question4 = question4;
	}

	public String getQuestion5() {
		return question5;
	}

	public void setQuestion5(String question5) {
		this.question5 = question5;
	}

	public String getQuestion6() {
		return question6;
	}

	public void setQuestion6(String question6) {
		this.question6 = question6;
	}

	public String getAnswer1() {
		return answer1;
	}

	public void setAnswer1(String answer1) {
		this.answer1 = answer1;
	}

	public String getAnswer2() {
		return answer2;
	}

	public void setAnswer2(String answer2) {
		this.answer2 = answer2;
	}

	public String getAnswer3() {
		return answer3;
	}

	public void setAnswer3(String answer3) {
		this.answer3 = answer3;
	}

	public String getAnswer4() {
		return answer4;
	}

	public void setAnswer4(String answer4) {
		this.answer4 = answer4;
	}

	public String getAnswer5() {
		return answer5;
	}

	public void setAnswer5(String answer5) {
		this.answer5 = answer5;
	}

	public String getAnswer6() {
		return answer6;
	}

	public void setAnswer6(String answer6) {
		this.answer6 = answer6;
	}
}
/*
 * public String searchByName() { try{ String
 * initializeString="select * from book where authorID = ?"; String
 * searchAuthorString="select * from author where name= ?"; Connection
 * tempConnection=bookConnection.getConnection(); PreparedStatement
 * bookstmt=tempConnection.prepareStatement(searchAuthorString);
 * PreparedStatement
 * jokePreparedStatement=tempConnection.prepareStatement(initializeString);
 * bookstmt.setString(1, target); ResultSet tempSet=bookstmt.executeQuery();
 * ResultSet rs=null; if(tempSet.next()) { jspTitle=target+"'s Book"; do {
 * jokePreparedStatement.setInt(1, tempSet.getInt("authorID"));
 * rs=jokePreparedStatement.executeQuery(); if(rs.next()) { do{ Book
 * tempBook=new Book(rs.getString("ISBN"),rs.getString("title"),
 * (String)Integer.toString(rs.getInt("authorID")),rs.getString("publishDate"),
 * rs.getString("publisher"),(String)Double.toString(rs.getDouble("price")));
 * B.add(tempBook); }while(rs.next()); } else {
 * System.out.println("find no book"); } }while(tempSet.next()); } else {
 * jspTitle="Not Find Author:"+target; System.out.print("not find author"); }
 * }catch(Exception e){ jspTitle="Search Fail";
 * System.out.println("fail in searchByBook"); } return SUCCESS; }
 * //************
 * ****************************************************************
 * ********************************* public String information() { B.clear();
 * try{ String initializeString="select * from author where authorID = ?";
 * String searchBookString="select * from book where ISBN= ?"; Connection
 * tempConnection=bookConnection.getConnection(); PreparedStatement
 * jokePreparedStatement=tempConnection.prepareStatement(initializeString);
 * PreparedStatement bookstmt=tempConnection.prepareStatement(searchBookString);
 * bookstmt.setString(1, target); ResultSet rs= bookstmt.executeQuery();
 * target="1"; if(rs.next()) { target="2";
 * jspTitle="《"+rs.getString("title")+"》's information"; target="3"; do{
 * target="4"; Book tempBook=new
 * Book(rs.getString("ISBN"),rs.getString("title"),
 * Integer.toString(rs.getInt("authorID")),rs.getString("publishDate"),
 * rs.getString("publisher"),Double.toString(rs.getDouble("price")));
 * target="5"; B.add(tempBook); jokePreparedStatement.setInt(1,
 * rs.getInt("authorID")); target="6"; ResultSet
 * temp=jokePreparedStatement.executeQuery(); target="7"; if(temp.next()){
 * target="8"; Author tempAuthor=new
 * Author((String)temp.getString("authorID"),temp
 * .getString("name"),temp.getString("age"),temp.getString("country"));
 * A.add(tempAuthor); } else { Author nullAuthor=new Author();
 * A.add(nullAuthor); } target="9"; }while(rs.next()); } else {
 * jspTitle="No this book:"+target; System.out.println("not find"); }
 * }catch(Exception e){ jspTitle="Fail in Finding This Book:"+target;
 * System.out.println("fail in information"); } return SUCCESS; }
 * //*************
 * ***************************************************************
 * ********************************* public String searchByBook() throws
 * SQLException { B.clear(); try{ Connection
 * tempConnection=bookConnection.getConnection(); //Statement
 * bookstmt=tempConnection.createStatement(); String
 * initialString="select * from book where title= ?"; PreparedStatement
 * bookstmt=tempConnection.prepareStatement(initialString);
 * bookstmt.setString(1, target); ResultSet rs= bookstmt.executeQuery();
 * if(rs.next()) { jspTitle="Searching Result"; do{ Book tempBook=new
 * Book(rs.getString("ISBN"),rs.getString("title"),
 * Integer.toString(rs.getInt("authorID")),rs.getString("publishDate"),
 * rs.getString("publisher"),Double.toString(rs.getDouble("price")));
 * B.add(tempBook); }while(rs.next()); } else { jspTitle="not find";
 * System.out.println("not find"); } }catch(Exception e){
 * jspTitle="search fail"; System.out.println("fail in searchByBook"); } return
 * SUCCESS; } public String AddBook() { B.clear(); try{ Connection
 * tempConnection=bookConnection.getConnection(); String
 * searchAuthorIDString="select * from author where authorID= ?"; String
 * searchISBNString="select * from book where ISBN= ?"; String addBookString=
 * "insert into book (ISBN,title,authorID,publisher,publishDate,price) values (?,?,?,?,?,?)"
 * ; PreparedStatement
 * searchAuthorIDPreparedStatement=tempConnection.prepareStatement
 * (searchAuthorIDString); PreparedStatement
 * searchISBNPreparedStatement=tempConnection
 * .prepareStatement(searchISBNString); PreparedStatement
 * addBookPreparedStatement=tempConnection.prepareStatement(addBookString);
 * searchAuthorIDPreparedStatement.setInt(1,
 * Integer.parseInt(newBook.getAuthorID())); ResultSet
 * rs=searchAuthorIDPreparedStatement.executeQuery(); if(rs.next()){
 * searchISBNPreparedStatement.setString(1, newBook.getISBN()); ResultSet
 * tempResultSet=searchISBNPreparedStatement.executeQuery();
 * if(tempResultSet.next()){ jspTitle="the ISBN already exsits";
 * target=newBook.getTitle(); } else { jspTitle="Add Succeed";
 * addBookPreparedStatement.setString(1, newBook.getISBN());
 * addBookPreparedStatement.setString(2, newBook.getTitle());
 * addBookPreparedStatement.setInt(3, Integer.parseInt(newBook.getAuthorID()));
 * addBookPreparedStatement.setString(4, newBook.getPublisher());
 * addBookPreparedStatement.setString(5, newBook.getPublishDate());
 * addBookPreparedStatement.setDouble(6,
 * Double.parseDouble(newBook.getPrice()));
 * addBookPreparedStatement.executeUpdate(); System.out.println("Add succeed");
 * } } else { jspTitle="authorID does not exist, add author first";
 * System.out.println("authorID does not exist, add author first"); B.clear(); }
 * }catch (Exception e) { // TODO: handle exception jspTitle="fail in AddBook";
 * System.out.println("fail in AddBook"); } return SUCCESS; }
 * //*****************
 * ***********************************************************
 * ************************** public String AddAuthor() { A.clear(); try{
 * Connection tempConnection=bookConnection.getConnection(); Statement
 * bookstmt=tempConnection.createStatement(); String
 * sqlString="select * from author where authorID= ?"; String
 * addAuthorString="insert into author (authorID,name,age,country) values (?,?,?,?)"
 * ; PreparedStatement
 * addAuthorPreparedStatement=tempConnection.prepareStatement(addAuthorString);
 * PreparedStatement
 * jokePreparedStatement=tempConnection.prepareStatement(sqlString);
 * jokePreparedStatement.setString(1, newAuthor.getAuthorID()); ResultSet
 * rs=jokePreparedStatement.executeQuery();
 * System.out.println("prepare succeed"); if(rs.next()){
 * jspTitle="authorID already exist";
 * System.out.println("authorID already exist"); } else {
 * addAuthorPreparedStatement.setInt(1,
 * Integer.parseInt(newAuthor.getAuthorID()));
 * addAuthorPreparedStatement.setString(2, newAuthor.getName());
 * addAuthorPreparedStatement.setString(3, newAuthor.getAge());
 * addAuthorPreparedStatement.setString(4, newAuthor.getCountry());
 * addAuthorPreparedStatement.executeUpdate();
 * System.out.println("Add succeed"); jspTitle="Add Succeed"; } }catch
 * (Exception e) { // TODO: handle exception jspTitle="fail in AddBook";
 * System.out.println("fail in AddAuthor"); } return SUCCESS; }
 * //***************
 * *************************************************************
 * ************************** public String delete() { B.clear(); try{
 * Connection tempConnection=bookConnection.getConnection(); Statement
 * bookstmt=tempConnection.createStatement();
 * bookstmt.executeUpdate("delete from book where ISBN= '"+target+"'");
 * jspTitle="Delete Succeed"; }catch(Exception e){ jspTitle="fail in delete";
 * System.out.println("fail in delete"); } return SUCCESS; }
 * //******************
 * **********************************************************
 * ********************** public void display(Book i) {
 * System.out.println(i.getISBN()+"   "+i.getTitle()+"   "+
 * i.getAuthorID()+"   "+i.getPublisher()+"   "+
 * i.getPublishDate()+"   "+i.getPrice()); } public void display(Author i) {
 * System.out.println(i.getAuthorID()+"   "+i.getName()+"   "+
 * i.getAge()+"   "+i.getCountry()); } public String getJspTitle() { return
 * jspTitle; } public void setJspTitle(String jspTitle) { this.jspTitle =
 * jspTitle; } public String getTarget() { return target; } public void
 * setTarget(String target) { this.target = target; } public ArrayList<Book>
 * getB() { return B; } public void setB(ArrayList<Book> b) { B = b; } public
 * ArrayList<Author> getA() { return A; } public void setA(ArrayList<Author> a)
 * { A = a; } public Book getNewBook() { return newBook; } public void
 * setNewBook(Book newBook) { this.newBook = newBook; } public Author
 * getNewAuthor() { return newAuthor; } public void setNewAuthor(Author
 * newAuthor) { this.newAuthor = newAuthor; }
 */
