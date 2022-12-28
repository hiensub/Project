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
    public class TopicController : Controller
    {      

        TopicDAO topicDAO = new TopicDAO();
        LinkDAO linkDAO = new LinkDAO();
        // GET: Admin/Topic
        public ActionResult Index()
        {
            return View(topicDAO.getList("Index"));
        }

        // GET: Admin/Topic/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Topic topic = topicDAO.getRow(id);
            if (topic == null)
            {
                return HttpNotFound();
            }
            return View(topic);
        }

        // GET: Admin/Topic/Create
        public ActionResult Create()
        {
            ViewBag.ListCat = new SelectList(topicDAO.getList("Index"), "Id", "Name", 0);
            ViewBag.ListOrder = new SelectList(topicDAO.getList("Index"), "Orders", "Name", 0);
            return View();
        }

       
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create(Topic topic)
        {
            if (ModelState.IsValid)
            {
                //xu ly them thong tin
                topic.Slug = XString.Str_slug(topic.Name);
                if (topic.ParentId == null)
                {
                    topic.ParentId = 0;
                }
                if (topic.Orders == null)
                {
                    topic.Orders = 1;
                }
                else
                {
                    topic.Orders += 1;
                }
                //topic.CreateBy = Convert.ToInt32(Session["UserId"].ToString());
                topic.CreateAt = DateTime.Now;
                if (topicDAO.Insert(topic) == 1)
                {
                    Link link = new Link();
                    link.Slug = topic.Slug;
                    link.TableId = topic.Id;
                    link.TypeLink = "topic";
                    linkDAO.Insert(link);
                }
                TempData["message"] = new XMessage("success", "thêm thành công");
                return RedirectToAction("Index");
            }
            ViewBag.ListCat = new SelectList(topicDAO.getList("Index"), "Id", "Name", 0);
            ViewBag.ListOrder = new SelectList(topicDAO.getList("Index"), "Orders", "Name", 0);

            return View(topic);
        }

        // GET: Admin/Topic/Edit/5
        public ActionResult Edit(int? id)
        {
            ViewBag.ListCat = new SelectList(topicDAO.getList("Index"), "Id", "Name", 0);
            ViewBag.ListOrder = new SelectList(topicDAO.getList("Index"), "Orders", "Name", 0);
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Topic topic = topicDAO.getRow(id);
            if (topic == null)
            {
                return HttpNotFound();
            }
            return View(topic);
        }

        
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit(Topic topic)
        {

            if (ModelState.IsValid)
            {
                topic.Slug = XString.Str_slug(topic.Name);
                if (topic.ParentId == null)
                {
                    topic.ParentId = 0;
                }
                if (topic.Orders == null)
                {
                    topic.Orders = 1;
                }
                else
                {
                    topic.Orders += 1;
                }
                //topic.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
                topic.UpdateAt = DateTime.Now;
                if (topicDAO.Update(topic) == 1)
                {
                    Link link = linkDAO.getRow(topic.Id, "topic");
                    link.Slug = topic.Slug;
                    linkDAO.Update(link);
                }
                TempData["message"] = new XMessage("success", "cập nhật thành công");
                return RedirectToAction("Index");
            }

            ViewBag.ListCat = new SelectList(topicDAO.getList("Index"), "Id", "Name", 0);
            ViewBag.ListOrder = new SelectList(topicDAO.getList("Index"), "Orders", "Name", 0);
            return View(topic);
        }

        // GET: Admin/Topic/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Topic topic = topicDAO.getRow(id);
            if (topic == null)
            {
                return HttpNotFound();
            }
            return View(topic);
        }

        // POST: Admin/Topic/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Topic topic = topicDAO.getRow(id);
            Link link = linkDAO.getRow(topic.Id, "topic");


            if (topicDAO.Delete(topic) == 1)
            {
                linkDAO.Delete(link);
            }

            TempData["message"] = new XMessage("success", "xóa mẫu tin thành công");
            return RedirectToAction("Trash", "Topic");
        }
        public ActionResult Trash()
        {
            return View(topicDAO.getList("Trash"));
        }
        public ActionResult Status(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "Topic");
            }
            Topic topic = topicDAO.getRow(id);
            if (topic == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "Topic");
            }
            topic.Status = (topic.Status == 1) ? 2 : 1;

            //topic.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            topic.UpdateAt = DateTime.Now;

            topicDAO.Update(topic);
            TempData["message"] = new XMessage("success", "thay đổi trạng thái thành công");
            return RedirectToAction("Index", "Topic");
        }
        public ActionResult DelTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Index", "Topic");
            }
            Topic topic = topicDAO.getRow(id);
            if (topic == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Index", "Topic");
            }
            topic.Status = 0;//trang thai rac==0

            //topic.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            topic.UpdateAt = DateTime.Now;

            topicDAO.Update(topic);
            TempData["message"] = new XMessage("success", "Xóa thành công");
            return RedirectToAction("Index", "Topic");
        }
        public ActionResult ReTrash(int? id)
        {
            if (id == null)
            {
                TempData["message"] = new XMessage("danger", "mã không tồn tại");
                return RedirectToAction("Trash", "Topic");
            }
            Topic topic = topicDAO.getRow(id);
            if (topic == null)
            {
                TempData["message"] = new XMessage("danger", "mẫu không tồn tại");
                return RedirectToAction("Trash", "Topic");
            }
            topic.Status = 2;//trang thai rac==0

            //topic.UpdateBy = Convert.ToInt32(Session["UserId"].ToString());
            topic.UpdateAt = DateTime.Now;

            topicDAO.Update(topic);
            TempData["message"] = new XMessage("success", "Khôi phục thành công");
            return RedirectToAction("Trash", "Topic");
        }
    }
}
