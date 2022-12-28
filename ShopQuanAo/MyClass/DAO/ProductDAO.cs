using MyClass.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using PagedList;


namespace MyClass.DAO
{
    public class ProductDAO
    {
        private MyDBContext db = new MyDBContext();
        public List<Product> getList(string status = "ALL")
        {
           
            List<Product> list = null;
            switch (status)
            {
                case "Index":
                    {
                        list = db.Products.Where(m => m.Status != 0).ToList();
                        break;
                    }
                case "Trash":
                    {
                        list = db.Products.Where(m => m.Status == 0).ToList();
                        break;
                    }
                default:
                    {
                        list = db.Products.ToList();
                        break;
                    }
            }
            return list;
        }
        
        public List<ProductInfo> getListByListCatId(List<int> listcatid, int take)
        {
            return db.Products.
                 Join(
                db.Categorys,
                p => p.CatId,
                c => c.Id,
                (p, c) => new ProductInfo
                {

                    Id = p.Id,
                    Name = p.Name,
                    CatName = c.Name,
                    Slug = p.Slug,
                    Deltail = p.Deltail,
                    MetaDesc = p.MetaDesc,
                    MetaKey = p.MetaKey,
                    Img = p.Img,
                    CatId = p.CatId,
                    Price = p.Price,
                    PriceSale = p.PriceSale,
                    CreateBy = p.CreateBy,
                    CreateAt = p.CreateAt,
                    UpdateBy = p.UpdateBy,
                    UpdateAt = p.UpdateAt,
                    Status = p.Status
                }
                )
                 .Where(m => m.Status == 1 && listcatid.Contains(m.CatId)).OrderByDescending(m => m.CreateAt).Take(take).ToList();

        }
        public List<ProductInfo> getList1(string status = "ALL")
        {
            List<ProductInfo> list = null;
            switch (status)
            {
                case "Index":
                    {
                        list = db.Products.
                            Join(
                db.Categorys,
                p => p.CatId,
                c => c.Id,
                (p, c) => new ProductInfo
                {

                    Id = p.Id,
                    Name = p.Name,
                    CatName = c.Name,
                    Slug = p.Slug,
                    Deltail = p.Deltail,
                    MetaDesc = p.MetaDesc,
                    MetaKey = p.MetaKey,
                    Img = p.Img,
                    CatId = p.CatId,
                    Price = p.Price,
                    PriceSale = p.PriceSale,
                    CreateBy = p.CreateBy,
                    CreateAt = p.CreateAt,
                    UpdateBy = p.UpdateBy,
                    UpdateAt = p.UpdateAt,
                    Status = p.Status
                }
                )
                            .Where(m => m.Status != 0).ToList();
                        break;
                    }
                case "Trash":
                    {
                        list = db.Products
                            .Join(
                db.Categorys,
                p => p.CatId,
                c => c.Id,
                (p, c) => new ProductInfo
                {

                    Id = p.Id,
                    Name = p.Name,
                    CatName = c.Name,
                    Slug = p.Slug,
                    Deltail = p.Deltail,
                    MetaDesc = p.MetaDesc,
                    MetaKey = p.MetaKey,
                    Img = p.Img,
                    CatId = p.CatId,
                    Price = p.Price,
                    PriceSale = p.PriceSale,
                    CreateBy = p.CreateBy,
                    CreateAt = p.CreateAt,
                    UpdateBy = p.UpdateBy,
                    UpdateAt = p.UpdateAt,
                    Status = p.Status
                }
                )
                            .Where(m => m.Status == 0).ToList();
                        break;
                    }
                default:
                    {
                        list = db.Products
                            .Join(
                db.Categorys,
                p => p.CatId,
                c => c.Id,
                (p, c) => new ProductInfo
                {

                    Id = p.Id,
                    Name = p.Name,
                    CatName = c.Name,
                    Slug = p.Slug,
                    Deltail = p.Deltail,
                    MetaDesc = p.MetaDesc,
                    MetaKey = p.MetaKey,
                    Img = p.Img,
                    CatId = p.CatId,
                    Price = p.Price,
                    PriceSale = p.PriceSale,
                    CreateBy = p.CreateBy,
                    CreateAt = p.CreateAt,
                    UpdateBy = p.UpdateBy,
                    UpdateAt = p.UpdateAt,
                    Status = p.Status
                }
                ).ToList();
                        break;
                    }
            }
            return list;
        }
        public Product getRow(int? id)
        {
                return db.Products.Find(id);
        }
        public List<Product> SearchByKey(string key)
        {
            return db.Products.SqlQuery("select * from Products where Name like '%"+key+"%' ").ToList();
        }
        public IPagedList<ProductInfo> getList(int pageSize, int pageNumber)
        {
            return db.Products.
                 Join(
                db.Categorys,
                p => p.CatId,
                c => c.Id,
                (p, c) => new ProductInfo
                {

                    Id = p.Id,
                    Name = p.Name,
                    CatName = c.Name,
                    Slug = p.Slug,
                    Deltail = p.Deltail,
                    MetaDesc = p.MetaDesc,
                    MetaKey = p.MetaKey,
                    Img = p.Img,
                    CatId = p.CatId,
                    Price = p.Price,
                    PriceSale = p.PriceSale,
                    CreateBy = p.CreateBy,
                    CreateAt = p.CreateAt,
                    UpdateBy = p.UpdateBy,
                    UpdateAt = p.UpdateAt,
                    Status = p.Status
                }
                )
                 .Where(m => m.Status == 1).
                 OrderByDescending(m => m.CreateAt).
                 ToPagedList(pageNumber,pageSize);

        }
        public Product getRow(string slug)
        {
            return db.Products.Where(m => m.Slug == slug && m.Status == 1).FirstOrDefault();
        }
        //thêm mẫu tin
        public int Insert(Product row)
        {
            db.Products.Add(row);
            return db.SaveChanges();
        }
        //Cập nhật
        public int Update(Product row)
        {
            db.Entry(row).State = EntityState.Modified;
            return db.SaveChanges();
        }
        //Xóa
        public int Delete(Product row)
        {
            db.Products.Remove(row);
            return db.SaveChanges();
        }
    }
}
