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

namespace ShopQuanAo.Areas.Admin.Controllers
{
    public class PageController : Controller
    {
        private PostDAO postDAO = new PostDAO();
        private LinkDAO linkDAO = new LinkDAO();
        

        // GET: Admin/Post
        public ActionResult Index()
        {
            return View(postDAO.getList("Index", "Page"));
        }

        // GET: Admin/Post/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Post post = postDAO.getRow(id);
            if (post == null)
            {
                return HttpNotFound();
            }
            return View(post);
        }

        // GET: Admin/Post/Create
        public ActionResult Create()
        {
            
            return View();
        }

        // POST: Admin/Post/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Post post)
        {
            if (ModelState.IsValid)
            {
                post.PostType = "Page";
                post.Slug = XString.Str_slug(post.Title);
                //post.CreateBy = Convert.ToInt32(Session["UserId"].ToString());
                post.CreateAt = DateTime.Now;
                if (postDAO.Insert(post) == 1)
                {
                    Link link = new Link();
                    link.Slug = post.Slug;
                    link.TableId = post.Id;
                    link.TypeLink = "page";
                    linkDAO.Insert(link);
                }
                TempData["message"] = new XMessage("success", "thêm thành công");
                return RedirectToAction("Index");
            }
            
            return View(post);
        }

        // GET: Admin/Post/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Post post = postDAO.getRow(id);
            if (post == null)
            {
                return HttpNotFound();
            }
           
            return View(post);
        }

        // POST: Admin/Post/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(Post post)
        {
            if (ModelState.IsValid)
            {
                post.PostType = "Page";
                post.Slug = XString.Str_slug(post.Title);
                //post.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
                post.UpdateAt = DateTime.Now;
                if (postDAO.Update(post) == 1)
                {
                    Link link = linkDAO.getRow(post.Id, "page");
                    link.Slug = post.Slug;
                    linkDAO.Update(link);
                }
                return RedirectToAction("Index");
            }
            
            return View(post);
        }

        // GET: Admin/Post/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Post post = postDAO.getRow(id);
            if (post == null)
            {
                return HttpNotFound();
            }
            
            return View(post);
        }

        // POST: Admin/Post/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Post post = postDAO.getRow(id);
            Link link = linkDAO.getRow(post.Id, "Page");
            

            if (postDAO.Delete(post) == 1)
            {
                linkDAO.Delete(link);
            }

            TempData["message"] = new XMessage("success", "xóa mẫu tin thành công");
            return RedirectToAction("Trash", "Page");
        }
        public ActionResult Trash()
        {
            return PartialView(postDAO.getList("Trash"));
        }
        public ActionResult Status(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "Page");
            }
            Post post = postDAO.getRow(id);
            if (post == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "Page");
            }
            post.Status = (post.Status == 1) ? 2 : 1;

            // Slider.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            post.UpdateAt = DateTime.Now;

            postDAO.Update(post);
            TempData["message"] = new XMessage("success", "thay đổi trạng thái thành công");
            return RedirectToAction("Index", "Page");
        }
        public ActionResult DelTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "Page");
            }
            Post post = postDAO.getRow(id);
            if (post == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "Page");
            }
            post.Status = 0;//trang thai rac==0

            // ơage.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            post.UpdateAt = DateTime.Now;

            postDAO.Update(post);
            TempData["message"] = new XMessage("success", "Xóa thành công");
            return RedirectToAction("Index", "Page");
        }
        public ActionResult ReTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Trash", "Page");
            }
            Post page = postDAO.getRow(id);
            if (page == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Trash", "Page");
            }
            page.Status = 2;//trang thai rac==0

            //Slider.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            page.UpdateAt = DateTime.Now;

            postDAO.Update(page);
            TempData["message"] = new XMessage("success", "Khôi phục thành công");
            return RedirectToAction("Trash", "Page");
        }

    }
}
