# -*-coding: UTF-8 -*-

from tkinter import *
from tkinter import ttk
from tkinter.messagebox import showinfo, showerror
import pymysql


class main(object):
    def __init__(self, master):
        self.Win = master
        self.Win.geometry('800x600')  # 设置窗口大小

        self.isbn = StringVar()
        self.name = StringVar()
        self.author = StringVar()
        self.publisher = StringVar()
        self.price = StringVar()

        self.createWindow()

    def createWindow(self):
        # self.Win = Frame(self.Win)
        # self.Win = tk.Tk(className="图书管理系统")
        # self.Win.pack()

        Label(self.Win, text="ISBN：").place(relx=0, rely=0.05, relwidth=0.1)
        Label(self.Win, text="书名：").place(relx=0.5, rely=0.05, relwidth=0.1)
        Label(self.Win, text="作者：").place(relx=0, rely=0.1, relwidth=0.1)
        Label(self.Win, text="出版社：").place(relx=0.5, rely=0.1, relwidth=0.1)
        Label(self.Win, text="价格：").place(relx=0, rely=0.15, relwidth=0.1)

        Entry(self.Win, textvariable=self.isbn).place(relx=0.1, rely=0.05, relwidth=0.37, height=25)
        Entry(self.Win, textvariable=self.name).place(relx=0.6, rely=0.05, relwidth=0.37, height=25)
        Entry(self.Win, textvariable=self.author).place(relx=0.1, rely=0.1, relwidth=0.37, height=25)
        Entry(self.Win, textvariable=self.publisher).place(relx=0.6, rely=0.1, relwidth=0.37, height=25)
        Entry(self.Win, textvariable=self.price).place(relx=0.1, rely=0.15, relwidth=0.37, height=25)

        # 表格
        self.tree = ttk.Treeview(self.Win, show='headings', column=('isbn', 'name', 'author', 'publisher', 'price'))
        self.tree.column('isbn', width=150, anchor="center")
        self.tree.column('name', width=150, anchor="center")
        self.tree.column('author', width=150, anchor="center")
        self.tree.column('publisher', width=150, anchor="center")
        self.tree.column('price', width=150, anchor="center")

        self.tree.heading('isbn', text='ISBN')
        self.tree.heading('name', text='书名')
        self.tree.heading('author', text='作者')
        self.tree.heading('publisher', text='出版社')
        self.tree.heading('price', text='价格')

        self.tree.place(rely=0.35, relwidth=1, relheight=0.6)
        # 按钮
        Button(self.Win, text="显示所有图书", command=self.showAllBooks).place(relx=0.15, rely=0.25, width=80)
        Button(self.Win, text="查询图书", command=self.searchBook).place(relx=0.3, rely=0.25, width=80)
        Button(self.Win, text="修改图书", command=self.modifyBook).place(relx=0.45, rely=0.25, width=80)
        Button(self.Win, text="添加图书", command=self.addBook).place(relx=0.6, rely=0.25, width=80)
        Button(self.Win, text="删除图书", command=self.deleteBook).place(relx=0.75, rely=0.25, width=80)


        self.showAllBooks()

    # 查询所有书籍信息
    def showAllBooks(self):
        x = self.tree.get_children()
        for item in x:
            self.tree.delete(item)
        con = pymysql.connect(user='root', password='123', database='books', charset='utf8')
        cur = con.cursor()
        cur.execute("select * from books")
        lst = cur.fetchall()
        # treeview的插入方法
        for item in lst:
            self.tree.insert("", 1, text="line1", values=item)
        cur.close()
        con.close()

    # 添加书籍信息
    def addBook(self):
        if self.isbn.get() == "" or self.name.get() == "" or self.author.get() == "" or self.publisher.get() == "" \
                or self.price.get() == "":
            showerror(title='提示', message='请输入完整信息！')
        else:
            x = self.tree.get_children()
            for item in x:
                self.tree.delete(item)

            con = pymysql.connect(user='root', password='123', database='books', charset='utf8')
            cur = con.cursor()

            isbn = self.isbn.get()
            name = self.name.get()
            author = self.author.get()
            publisher = self.publisher.get()
            price = self.price.get()
            # 检验ISBN是否已经存在
            sqlSearch = "select * from books where isbn = %s"
            result = cur.execute(sqlSearch, isbn)
            if result > 0:
                showerror(title="提示", message="ISBN已存在！")
            else:
                sql = "insert into books values(%s,%s,%s,%s,%s)"
                cur.execute(sql, (isbn, name, author, publisher, price))
                con.commit()
                cur.execute("select * from books")
                lst = cur.fetchall()
                for item in lst:
                    self.tree.insert("", 1, text="line1", values=item)
            cur.close()
            con.close()

    # 删除书籍信息
    def deleteBook(self):
        if self.isbn.get() == '':
            showerror(title='提示', message='请输入ISBN')
        else:
            con = pymysql.connect(user='root', password='123', database='books', charset='utf8')
            cur = con.cursor()
            line = cur.execute("delete from books where isbn = %s", self.isbn.get())
            if line == 0:
                showerror(title="提示", message="删除失败，请检查ISBN")
            else:
                showinfo(title="提示", message="删除成功！")
                con.commit()
            cur.close()
            con.close()
            self.showAllBooks()

    # 查询书籍信息
    def searchBook(self):
        # 针对书名进行查询并显示
        if self.name.get() == "":
            showerror(title='提示', message='请输入书籍名称进行查询')
        else:
            con = pymysql.connect(user='root', password='123', database='books', charset='utf8')
            cur = con.cursor()
            # 对模糊查询的%进行转移
            sqlname = "select * from books where name like '%%%%%s%%%%'"
            sqlname = sqlname % (self.name.get())
            result = cur.execute(sqlname)
            if result < 1:
                showerror(title='提示', message='未找到相关图书')
            else:
                # 清除原有Treeview数据
                x = self.tree.get_children()
                for item in x:
                    self.tree.delete(item)
                lst = cur.fetchall()
                for item in lst:
                    self.tree.insert("", 1, text="line1", values=item)

            cur.close()
            con.close()

    # 修改书籍信息
    def modifyBook(self):
        if self.isbn.get() == "" or self.name.get() == "" or self.author.get() == "" or self.publisher.get() == "" \
                or self.price.get() == "":
            showerror(title='提示', message='请输入完整信息！')
        else:
            con = pymysql.connect(user='root', password='123', database='books', charset='utf8')
            cur = con.cursor()
            # sql = 'update books set name=' + self.name.get() + ',' + 'author=' + self.author.get() + ',' \
            #       + 'publisher=' + self.publisher.get() + ',' + 'price=' + self.price.get() + ' where isbn=' + self.isbn.get()
            # result = cur.execute(sql, (
            #     self.name.get(), self.author.get(), self.publisher.get(), self.price.get(), self.isbn.get()))
            sql = 'update books set name=%s, author=%s, publisher=%s, price= %s where isbn= %s'
            # result = cur.execute(sql)
            result = cur.execute(sql, (
                 self.name.get(), self.author.get(), self.publisher.get(), float(self.price.get()), self.isbn.get()))
            print(sql)
            print(result)
            if result > 0:
                showinfo(title='提示', message='修改成功！')
                con.commit()
                self.showAllBooks()
            else:
                showerror(title="提示", message="修改失败！")
            cur.close()
            con.close()



#
# if __name__ == '__main__':
#     Win = tk.Tk(className="图书管理系统")
#     main(Win)
#     Win.mainloop()
