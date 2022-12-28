using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using MyClass.Models;
using MyClass.DAO;
using ShopQuanAo.Library;
using System.IO;

namespace ShopQuanAo.Areas.Admin.Controllers
{
    public class productController : Controller
    {
        ProductDAO productDAO = new ProductDAO();
        LinkDAO linkDAO = new LinkDAO();
        // GET: Admin/product
        public ActionResult Index()
        {
            return View(productDAO.getList("Index"));
        }
        

        // GET: Admin/product/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Product product = productDAO.getRow(id);
            if (product == null)
            {
                return HttpNotFound();
            }
            return View(product);
        }

        // GET: Admin/product/Create
        public ActionResult Create()
        {
            ViewBag.ListOrder = new SelectList(productDAO.getList("Index"), "Orders", "Name", 0);
            return View();
        }

        // POST: Admin/product/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Product product)
        {
            if (ModelState.IsValid)
            {
                //xu ly them thong tin
                product.Slug = XString.Str_slug(product.Name);
                
                var img = Request.Files["img"];
                if (img.ContentLength != 0)
                {
                    //upload file
                    string[] FileExtentions = new string[] { ".jpg", ".jepg", ".png", ".gif" };
                    //kiem tra tap tin
                    if (FileExtentions.Contains(img.FileName.Substring(img.FileName.LastIndexOf("."))))
                    {
                        string slug = product.Slug;
                        //upload hinh
                        string imgName = slug + img.FileName.Substring(img.FileName.LastIndexOf("."));
                        product.Img = imgName;
                        string PathDir = "~/Public/images/product/";
                        string PathFile = Path.Combine(Server.MapPath(PathDir), imgName);
                        img.SaveAs(PathFile);
                    }
                }

               // product.CreateBy = Convert.ToInt32(Session["UserId"].ToString());
                product.CreateAt = DateTime.Now;
                productDAO.Insert(product);
               
                TempData["message"] = new XMessage("success", "thêm thành công");
                return RedirectToAction("Index");
            }
            ViewBag.ListOrder = new SelectList(productDAO.getList("Index"), "Orders", "Name", 0);
            return View(product);
        }

        // GET: Admin/product/Edit/5
        public ActionResult Edit(int? id)
        {

            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Product product = productDAO.getRow(id);
            if (product == null)
            {
                return HttpNotFound();
            }
            ViewBag.ListOrder = new SelectList(productDAO.getList("Index"), "Orders", "Name", 0);
            return View(product);
        }

        // POST: Admin/product/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(Product product)
        {

            if (ModelState.IsValid)
            {
                product.Slug = XString.Str_slug(product.Name);
                
                var img = Request.Files["img"];
                if (img.ContentLength != 0)
                {
                    //upload file
                    string[] FileExtentions = new string[] { ".jpg", ".jepg", ".png", ".gif" };
                    //kiem tra tap tin
                    if (FileExtentions.Contains(img.FileName.Substring(img.FileName.LastIndexOf("."))))
                    {
                        string slug = product.Slug;
                        //upload hinh
                        string imgName = slug + img.FileName.Substring(img.FileName.LastIndexOf("."));
                        product.Img = imgName;
                        string PathDir = "~/Public/images/product/";
                        string PathFile = Path.Combine(Server.MapPath(PathDir), imgName);
                        //xoa file
                        if (product.Img != null)
                        {
                            string DelPath = Path.Combine(Server.MapPath(PathDir), imgName);
                            System.IO.File.Delete(DelPath);
                        }
                        img.SaveAs(PathFile);
                    }
                }

               // product.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
                product.UpdateAt = DateTime.Now;
                productDAO.Update(product);
                
                TempData["message"] = new XMessage("success", "cập nhật thành công");
                return RedirectToAction("Index");
            }
            ViewBag.ListOrder = new SelectList(productDAO.getList("Index"), "Orders", "Name", 0);
            return View(product);
        }

        // GET: Admin/product/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Product product = productDAO.getRow(id);
            if (product == null)
            {
                return HttpNotFound();
            }
            return View(product);
        }

        // POST: Admin/product/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Product product = productDAO.getRow(id);
            Link link = linkDAO.getRow(product.Id, "product");
            string PathDir = "~/Public/images/product/";
            if (product.Img != null)
            {
                string DelPath = Path.Combine(Server.MapPath(PathDir), product.Img);
                System.IO.File.Delete(DelPath);
            }

            if (productDAO.Delete(product) == 1)
            {
                linkDAO.Delete(link);
            }

            TempData["message"] = new XMessage("success", "xóa mẫu tin thành công");
            return RedirectToAction("Trash", "product");
        }
        public ActionResult Trash()
        {
            return View(productDAO.getList("Trash"));
        }
        public ActionResult Status(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "product");
            }
            Product product = productDAO.getRow(id);
            if (product == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "product");
            }
            product.Status = (product.Status == 1) ? 2 : 1;

           // product.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            product.UpdateAt = DateTime.Now;

            productDAO.Update(product);
            TempData["message"] = new XMessage("success", "thay đổi trạng thái thành công");
            return RedirectToAction("Index", "product");
        }
        public ActionResult DelTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "product");
            }
            Product product = productDAO.getRow(id);
            if (product == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "product");
            }
            product.Status = 0;//trang thai rac==0

           // product.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            product.UpdateAt = DateTime.Now;

            productDAO.Update(product);
            TempData["message"] = new XMessage("success", "Xóa thành công");
            return RedirectToAction("Index", "product");
        }
        public ActionResult ReTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Trash", "product");
            }
            Product product = productDAO.getRow(id);
            if (product == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Trash", "product");
            }
            product.Status = 2;//trang thai rac==0

            //product.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            product.UpdateAt = DateTime.Now;

            productDAO.Update(product);
            TempData["message"] = new XMessage("success", "Khôi phục thành công");
            return RedirectToAction("Trash", "product");
        }
        public ActionResult Search()
        {
            return View();
        }
    }
}
