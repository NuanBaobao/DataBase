# -*-coding: UTF-8 -*-
import tkinter as tk

from login import Login

if __name__ == '__main__':
    root = tk.Tk(className="图书管理系统")
    Login(root)
    root.mainloop()
