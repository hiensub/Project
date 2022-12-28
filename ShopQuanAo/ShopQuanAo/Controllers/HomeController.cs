using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using MyClass.Models;
using MyClass.DAO;
using PagedList;

namespace ShopQuanAo.Controllers
{
    public class HomeController : Controller
    {
        private MyDBContext db = new MyDBContext();
        LinkDAO linkDAO =new LinkDAO();
        ProductDAO productDAO = new ProductDAO();
        PostDAO postDAO =new PostDAO();
        CategoryDAO categoryDAO = new CategoryDAO();
        TopicDAO topicDAO = new TopicDAO();
        // GET: Home
        public ActionResult Index(string slug=null)
        {
            
            if (slug == null)
            {
                //trang chu ko the viet ma lenh o day
                return this.Site();
            }
            else
            {
                //tim slug co trong bang link
                Link link = linkDAO.getRow(slug);
                if (link != null)
                {
                    //slug co trong bang link
                    string typelink = link.TypeLink;
                    switch (typelink)
                    {
                        case "category":
                            {
                                return this.ProductCategory(slug);
                            }
                        case "topic":
                            {
                                return this.PostTopic(slug);
                            }
                        case "page":
                            {
                                return this.PostPage(slug);
                            }
                        default:
                            {
                                return this.Error404(slug);
                            }

                    }
                }
                else
                {
                    //slug ko có trong bang link
                    Product product = productDAO.getRow(slug);
                    if(product != null)
                    {
                        return this.ProductDetail(product);
                    }
                    else
                    {
                        Post post = postDAO.getRow(slug);
                        if(post != null)
                        {
                           return this.PostDetail(post);
                        }
                        else
                        {
                            return this.Error404(slug);
                        }
                    }
                }
            }
        }
        public ActionResult Site()
        {
            List<Category> list = categoryDAO.getListByParentId(0);
            return View("Site",list);

        }

        public ActionResult HomeProduct(int id)
        {
            Category category = categoryDAO.getRow(id);
            ViewBag.Category = category;
            //danh muc theo 3 cap
            List<int> listcatid = new List<int>();
            listcatid.Add(id);//cap1
            List<Category> listcategory2 = categoryDAO.getListByParentId(id);
            if (listcategory2.Count() != 0)
            {
                foreach(var category2 in listcategory2 ){
                    listcatid.Add(category2.Id);//cap2
                    List<Category> listcategory3 = categoryDAO.getListByParentId(category2.Id);
                    if (listcategory3.Count() != 0)
                    {
                        foreach (var category3 in listcategory3)
                        {
                            listcatid.Add(category3.Id);//cap3
                        }
                    }
                }
            }

            List<ProductInfo> list = productDAO.getListByListCatId(listcatid,8);
            return View("HomeProduct",list);
        }
        public ActionResult Product(int? page)
        {
            int pageNumber = page ?? 1;//trang thu nhat
            int pageSize = 9;//số mẫu tin hiển thị trên trang
            IPagedList<ProductInfo> list = productDAO.getList(pageSize, pageNumber);
            return View("Product",list);
        }
        public ActionResult ProductCategory(string slug)
        {
            Category category = categoryDAO.getRow(slug);
            ViewBag.Category = category;
            //danh muc theo 3 cap
            List<int> listcatid = new List<int>();
            listcatid.Add(category.Id);//cap1
            List<Category> listcategory2 = categoryDAO.getListByParentId(category.Id);
            if (listcategory2.Count() != 0)
            {
                foreach (var category2 in listcategory2)
                {
                    listcatid.Add(category2.Id);//cap2
                    List<Category> listcategory3 = categoryDAO.getListByParentId(category2.Id);
                    if (listcategory3.Count() != 0)
                    {
                        foreach (var category3 in listcategory3)
                        {
                            listcatid.Add(category3.Id);//cap3
                        }
                    }
                }
            }
            int take = 10;
            List<ProductInfo> list = productDAO.getListByListCatId(listcatid, take);
            return View("ProductCategory",list);
        }
        public ActionResult ProductDetail(Product product)
        {

            return View("ProductDetail",product);
        }

        public ActionResult Post()
        {
            List<PostInfo> list = postDAO.getList("Post");
            return View("Post",list);
        }
        public ActionResult PostTopic(string slug)
        {
            Topic topic = topicDAO.getRow(slug);
            
            return View("PostTopic",topic);
        }
        public ActionResult PostPage(string slug)
        {
            Post post = postDAO.getRow(slug,"page");
            return View("PostPage",post);
        }
        public ActionResult PostDetail( Post post)
        {
            ViewBag.ListOther = postDAO.getListByTopicId(post.TopicId,"Post");
            return View("PostDetail",post);
        }
        //public ActionResult MenuFooter()
        //{
        //    List<Menu> list = MenuDAO.getListParentId("footer", 0);
        //    return View("MenuFooter");
        //}
        public ActionResult Error404(string slug)
        {

            return View("Error404");
        }
        public ActionResult Search()
        {
            
            List<Product> list = productDAO.SearchByKey("Search");
            return View("Search", list);
        }
    }
}