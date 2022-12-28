using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using MyClass.Models;
using MyClass.DAO;

namespace ShopQuanAo.Controllers
{
    public class ModuleController : Controller
    {
        private MenuDAO menuDAO = new MenuDAO();
        private SliderDAO sliderDAO = new SliderDAO();
        private CategoryDAO categoryDAO = new CategoryDAO();
        // GET: Module
        public ActionResult MainMenu()
        {
            List<Menu> list = menuDAO.getListParentId("mainmenu", 0);
            return View("MainMenu", list);
        }
        public ActionResult MainMenuSub(int id)
        {
            Menu menu = menuDAO.getRow(id);
            List<Menu> list = menuDAO.getListParentId("mainmenu", id);
            if (list.Count == 0)
            {
                return View("MainMenuSub1", menu);//ko có con
            }
            else
            {
                ViewBag.Menu = menu;
                return View("MainMenuSub2", list);//có con
            }

        }
        public ActionResult Slideshow()
        {
            List<Slider> list = sliderDAO.getListByPosition("Slideshow");
            return View("Slideshow", list);
        }
        public ActionResult ListCategory()
        {
            List<Category> list = categoryDAO.getListByParentId(0);
            return View("ListCategory",list);
        }
        public ActionResult PostLastNew()
        {
            
            return View("PostLastNew");
        }
        public ActionResult MenuFooter()
        {
            List<Menu> list = menuDAO.getListParentId("footer",0);
            return View("MenuFooter",list);
        }
        
    }
}