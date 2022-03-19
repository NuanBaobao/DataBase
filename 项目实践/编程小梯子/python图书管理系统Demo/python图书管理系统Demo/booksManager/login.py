# -*-coding: UTF-8 -*-
from tkinter import *
from tkinter.messagebox import showinfo
from main import main


class Login(object):
    def __init__(self, master):
        self.root = master  # 定义内部变量root
        self.root.geometry('300x180')  # 设置窗口大小

        self.username = StringVar()
        self.password = StringVar()
        self.createWindow()

    def createWindow(self):
        self.Win = Frame(self.root)  # 创建Frame
        self.Win.pack()
        Label(self.Win).grid(row=0, stick=W)
        Label(self.Win, text='账户: ').grid(row=1, stick=W, pady=10)
        Entry(self.Win, textvariable=self.username).grid(row=1, column=1, stick=E)
        Label(self.Win, text='密码: ').grid(row=2, stick=W, pady=10)
        Entry(self.Win, textvariable=self.password, show='*').grid(row=2, column=1, stick=E)
        Button(self.Win, text='登陆', command=self.loginCheck).grid(row=3, stick=W, pady=10)
        Button(self.Win, text='退出', command=self.Win.quit).grid(row=3, column=1, stick=E)

    def loginCheck(self):
        name = self.username.get()
        password = self.password.get()
        if name == 'admin' and password == '123456':
            self.Win.destroy()
            main(self.root)
        else:
            showinfo(title='错误', message='账号或密码错误！')


