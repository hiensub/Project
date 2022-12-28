using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using MyClass.DAO;
using MyClass.Models;

namespace ShopQuanAo.Areas.Admin.Controllers
{
    public class MenuController : Controller
    {
        CategoryDAO categoryDAO = new CategoryDAO();
        TopicDAO topicDAO = new TopicDAO();
        PostDAO postDAO = new PostDAO();
        MenuDAO menuDAO = new MenuDAO();

        // GET: Admin/Menu
        public ActionResult Index()
        {
            ViewBag.ListCategory = categoryDAO.getList("Index");
            ViewBag.ListTopic = topicDAO.getList("Index");
            ViewBag.ListPage = postDAO.getList("Index", "Page");
            List<Menu> menu = menuDAO.getList("Index");
            return View("Index",menu);
        }
        [HttpPost]
        public ActionResult Index(FormCollection form)
        {
            //category
            if (!string.IsNullOrEmpty(form["ThemCategory"]))
            {
                
                if (!string.IsNullOrEmpty(form["itemcat"]))
                {
                    var listitem = form["itemcat"];//1234567
                    var listarr = listitem.Split(',');
                    foreach(var row in listarr)
                    {
                        int id = int.Parse(row);
                        Category category = categoryDAO.getRow(id);
                        Menu menu = new Menu();
                        menu.Name = category.Name;
                        menu.Link = category.Slug;
                        menu.TableId = category.Id;
                        menu.TypeMenu = "category";
                        menu.Position = form["Position"];
                        menu.ParentId = 0;
                        menu.Orders = 0;
                        //menu.CreateBy = Convert.ToInt32(Session["UserId"].ToString());
                        menu.CreateAt = DateTime.Now;
                        menu.Status = 2;
                        menuDAO.Insert(menu);
                    }
                    TempData["message"] = new XMessage("success", "thêm thành công");
                }
                else
                {
                    TempData["message"] = new XMessage("danger", "Chưa chọn danh mục sản phẩm");
                }
            }
            //topic
            if (!string.IsNullOrEmpty(form["ThemTopic"]))
            {

                if (!string.IsNullOrEmpty(form["itemtopic"]))
                {
                    var listitem = form["itemtopic"];//1234567
                    var listarr = listitem.Split(',');
                    foreach (var row in listarr)
                    {
                        int id = int.Parse(row);
                        Topic topic = topicDAO.getRow(id);
                        Menu menu = new Menu();
                        menu.Name = topic.Name;
                        menu.Link = topic.Slug;
                        menu.TableId = topic.Id;
                        menu.TypeMenu = "topic";
                        menu.Position = form["Position"];
                        menu.ParentId = 0;
                        menu.Orders = 0;
                        //menu.CreateBy = Convert.ToInt32(Session["UserId"].ToString());
                        menu.CreateAt = DateTime.Now;
                        menu.Status = 2;
                        menuDAO.Insert(menu);
                    }
                    TempData["message"] = new XMessage("success", "thêm thành công");
                }
                else
                {
                    TempData["message"] = new XMessage("danger", "Chưa chọn danh mục sản phẩm");
                }
            }
            //page
            if (!string.IsNullOrEmpty(form["ThemPage"]))
            {

                if (!string.IsNullOrEmpty(form["itempage"]))
                {
                    var listitem = form["itempage"];//1234567
                    var listarr = listitem.Split(',');
                    foreach (var row in listarr)
                    {
                        int id = int.Parse(row);
                        Post post = postDAO.getRow(id);
                        Menu menu = new Menu();
                        menu.Name = post.Title;
                        menu.Link = post.Slug;
                        menu.TableId = post.Id;
                        menu.TypeMenu = "page";
                        menu.Position = form["Position"];
                        menu.ParentId = 0;
                        menu.Orders = 0;
                       // menu.CreateBy = Convert.ToInt32(Session["UserId"].ToString());
                        menu.CreateAt = DateTime.Now;
                        menu.Status = 2;
                        menuDAO.Insert(menu);
                    }
                    TempData["message"] = new XMessage("success", "thêm thành công");
                }
                else
                {
                    TempData["message"] = new XMessage("danger", "Chưa chọn danh mục sản phẩm");
                }
            }
            //them custom
            if (!string.IsNullOrEmpty(form["ThemCustom"]))
            {
                if (!string.IsNullOrEmpty(form["name"])&& !string.IsNullOrEmpty(form["link"]))
                {

                    Menu menu = new Menu();
                    menu.Name = form["name"];
                    menu.Link = form["link"];
                    menu.TypeMenu = "custom";
                    menu.Position = form["Position"];
                    menu.ParentId = 0;
                    menu.Orders = 0;
                   // menu.CreateBy = Convert.ToInt32(Session["UserId"].ToString());
                    menu.CreateAt = DateTime.Now;
                    menu.Status = 2;
                    menuDAO.Insert(menu);
                    TempData["message"] = new XMessage("success", "thêm thành công");
                }
                else
                {
                    TempData["message"] = new XMessage("danger", "chưa nhập đủ thông tin");
                }
            }




            return RedirectToAction("Index", "Menu");
        }
        public ActionResult Edit(int? id)
        {
            ViewBag.ListMenu = new SelectList(menuDAO.getList("Index"), "Id", "Name");
            ViewBag.ListOrder = new SelectList(menuDAO.getList("Index"), "Orders", "Name");
            Menu menu = menuDAO.getRow(id);
            return View("Edit", menu);
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(Menu menu)
        {

            if (ModelState.IsValid)
            {
                
                if (menu.ParentId == null)
                {
                    menu.ParentId = 0;
                }
                if (menu.Orders == null)
                {
                    menu.Orders = 1;
                }
                else
                {
                    menu.Orders += 1;
                }
                //menu.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
                menu.UpdateAt = DateTime.Now;
                menuDAO.Update(menu);
                
                TempData["message"] = new XMessage("success", "cập nhật thành công");
                return RedirectToAction("Index");
            }

            ViewBag.ListMenu = new SelectList(menuDAO.getList("Index"), "Id", "Name");
            ViewBag.ListOrder = new SelectList(menuDAO.getList("Index"), "Orders", "Name");
            return View(menu);
        }
        public ActionResult Status(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "Menu");
            }
            Menu menu = menuDAO.getRow(id);
            if (menu == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "Menu");
            }
            menu.Status = (menu.Status == 1) ? 2 : 1;

            //menu.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            menu.UpdateAt = DateTime.Now;

            menuDAO.Update(menu);
            TempData["message"] = new XMessage("success", "thay đổi trạng thái thành công");
            return RedirectToAction("Index", "Menu");
        }
        public ActionResult DelTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "Menu");
            }
            Menu menu = menuDAO.getRow(id);
            if (menu == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "Menu");
            }
            menu.Status = 0;//trang thai rac==0

            //menu.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            menu.UpdateAt = DateTime.Now;

            menuDAO.Update(menu);
            TempData["message"] = new XMessage("success", "Xóa thành công");
            return RedirectToAction("Index", "Menu");
        }
        public ActionResult Trash()
        {
            List<Menu> menu = menuDAO.getList("Index");
            return View("Trash",menu);
        }
        public ActionResult ReTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Trash", "Menu");
            }
            Menu menu = menuDAO.getRow(id);
            if (menu == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Trash", "Menu");
            }
            menu.Status = 2;//trang thai rac==0

            //menu.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            menu.UpdateAt = DateTime.Now;

            menuDAO.Update(menu);
            TempData["message"] = new XMessage("success", "Khôi phục thành công");
            return RedirectToAction("Trash", "Menu");
        }
    }
}