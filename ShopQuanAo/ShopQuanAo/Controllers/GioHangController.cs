using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using MyClass.DAO;
using MyClass.Models;
using ShopQuanAo.Library;


namespace ShopQuanAo.Controllers
{
    public class GioHangController : Controller
    {
        ProductDAO productDAO = new ProductDAO();
        XCart xCart = new XCart();
        UserDAO userDAO = new UserDAO();
        OrderDAO orderDAO = new OrderDAO();
        OrderDetailDAO orderDetailDAO = new OrderDetailDAO();
        // GET: Cart
        public ActionResult Index()
        {
            List<CartItem> listcart = xCart.getCart();
            return View("Index", listcart);
        }
        public ActionResult CartAdd(int productid)
        {
            Product product = productDAO.getRow(productid);
            CartItem cartItem = new CartItem(product.Id, product.Name, product.Img, product.Price, 1);

            List<CartItem> listcart = xCart.AddCart(cartItem, productid);


            return RedirectToAction("Index", "GioHang");
        }
        public ActionResult CartDel(int productid)
        {
            xCart.DelCart(productid);
            return RedirectToAction("Index", "GioHang");
        }
        public ActionResult CartUpDate(FormCollection form)
        {
            if (!string.IsNullOrEmpty(form["capnhat"]))
            {
                var listsl = form["sl"];
                var listarr = listsl.Split(',');
                xCart.UpdateCart(listarr);

            }
            return RedirectToAction("Index", "GioHang");
        }
        public ActionResult CartDelAll()
        {
            xCart.DelCart();
            return RedirectToAction("Index", "GioHang");
        }
        public ActionResult ThanhToan()
        {
            List<CartItem> listcart = xCart.getCart();
            if (Session["UserCustomer"].Equals(""))
            {
                return Redirect("~/dang-nhap");
            }
            int userid = int.Parse(Session["CustomerId"].ToString());
            User user = userDAO.getRow(userid);
            ViewBag.user = user;
            return View("ThanhToan", listcart);
        }
        public ActionResult DatMua(FormCollection field)
        {
            int userid = int.Parse(Session["CustomerId"].ToString());
            User user = userDAO.getRow(userid);
            string note = field["Note"];
            Order order = new Order();
            order.UseId = userid;
            order.Note = note;
            order.Status = 1;
            orderDAO.Insert(order);
            if (orderDAO.Insert(order) == 1)
            {
                List<CartItem> listcart = xCart.getCart();
                foreach (CartItem cartItem in listcart)
                {
                    OrderDetail orderDetail = new OrderDetail();
                    orderDetail.OrderId = order.Id;
                    orderDetail.ProductId = cartItem.ProductId;
                    orderDetail.Price = cartItem.Price;
                    orderDetail.Qty = cartItem.SL;
                    orderDetail.Amount = cartItem.Amount;
                    orderDetailDAO.Insert(orderDetail);
                }
            }
            return Redirect("~/thanh-cong");
        }
        public ActionResult ThanhCong()
        {
            return View();
        }
    }
}