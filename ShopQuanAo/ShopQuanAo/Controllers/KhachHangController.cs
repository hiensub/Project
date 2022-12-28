using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using ShopQuanAo.Library;
using MyClass.DAO;
using MyClass.Models;
using System.Security.Cryptography;
using System.Text;

namespace ShopQuanAo.Controllers
{
    public class KhachHangController : Controller
    {
        private MyDBContext db = new MyDBContext();
        UserDAO userDAO = new UserDAO();
        // GET: KhachHang
        public ActionResult DangNhap()
        {
            return View();
        }
        [HttpPost]
        public ActionResult DangNhap(FormCollection filed)
        {
            string username = filed["username"];
            string password = XString.ToMd5(filed["password"]);
            User row_user = userDAO.getRow(username, "Customer");
            String strError = "";
            if (row_user == null)
            {
                strError = "Tên đăng nhập không tồn tại";
            }
            else
            {
                if (password.Equals(row_user.PassWord))
                {
                    Session["UserCustomer"] = username;
                    Session["CustomerId"] = row_user.Id;
                    return Redirect("~/");
                }
                else
                {
                    strError = password;
                }

            }
            ViewBag.Error = "<span class ='text-danger'>" + strError + "</div>";
            return View("DangNhap");
        }
        
        public ActionResult DangKi(User user)
        {
            if (ModelState.IsValid)
            {
                var check = db.Users.FirstOrDefault(s => s.UseName == user.UseName);
                if (check == null)
                {
                    user.PassWord = GetMD5(user.PassWord);
                    db.Configuration.ValidateOnSaveEnabled = false;
                    db.Users.Add(user);
                    db.SaveChanges();
                    return RedirectToAction("Index");
                }
                else
                {
                    ViewBag.error = "Ten sai";
                    return View();
                }
            }
            return View("DangKi");
        }
        public ActionResult DangXuat()
        {
            Session["UserCustomer"] = "";
            Session["CustomerId"] = "";

            return RedirectToAction("DangNhap");
        }
        public static string GetMD5(string str)
        {
            MD5 mD5 = new MD5CryptoServiceProvider();
            byte[] fromData = Encoding.UTF8.GetBytes(str);
            byte[] targetData = mD5.ComputeHash(fromData);
            string byte2String = null;
            for (int i = 0; i < targetData.Length; i++)
            {
                byte2String += targetData[i].ToString("x2");
            }
            return byte2String;
        }
    }
}