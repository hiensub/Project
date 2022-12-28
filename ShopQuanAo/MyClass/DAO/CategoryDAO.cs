using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MyClass.Models;



namespace MyClass.DAO
{
    public class CategoryDAO
    {
        private MyDBContext db = new MyDBContext();
        public List<Category> getListByParentId(int parentid)
        {
            return  db.Categorys.Where(m => m.ParentId == parentid && m.Status == 1).OrderBy(m => m.Orders).ToList();
        }
        //danh sách mẫu tin
        public List<Category> getList(string status = "ALL")
        {
            List<Category> list = null;
            switch (status)
            {
                case "Index":
                    {
                        list = db.Categorys.Where(m => m.Status != 0).ToList();
                        break;
                    }
                case "Trash":
                    {
                        list = db.Categorys.Where(m => m.Status == 0).ToList();
                        break;
                    }
                default:
                    {
                        list = db.Categorys.ToList();
                        break;
                    }
            }
            return list;
        }
           
        
        //1 mẫu tin
        public Category getRow(int? id)
        {
            if (id == null)
            {
                return null;
            }
            else
            {
                return db.Categorys.Find(id);
            }    

        }
        public Category getRow(string slug)
        {

            return db.Categorys.Where(m => m.Slug == slug && m.Status == 1).FirstOrDefault();
            

        }
        //thêm mẫu tin
        public int Insert(Category row)
        {
            db.Categorys.Add(row);
            return db.SaveChanges();
        }
        //Cập nhật
        public int Update(Category row)
        {
            db.Entry(row).State = EntityState.Modified;
            return db.SaveChanges();
        }
        //Xóa
        public int Delete(Category row)
        {
            db.Categorys.Remove(row);          
            return db.SaveChanges();
        }
    }
}
//if (status == "ALL")
//{
//    return db.Categorys.ToList();
//}
//else
//{
//    if (status == "Index")
//    {
//        //LẤY RA NHỮNG MẪU TIN CÓ TRẠNG THÁI KHÁC 0
//        return db.Categorys.Where(m => m.Status != 0).ToList();
//    }
//    if (str == "Trash")
//    {
//        //LẤY RA NHỮNG MẪU TIN CÓ TRẠNG THÁI == 0
//        return db.Categorys.Where(m => m.Status == 0).ToList();
//    }

//}
//return db.Categorys.ToList();//select * from Categorys

//1 mẫu tin