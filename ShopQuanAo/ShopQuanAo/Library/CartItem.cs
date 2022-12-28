using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace ShopQuanAo.Library
{
     public class CartItem
    {
        public int ProductId { get; set; }
        public string Name { get; set; }
        public string Img { get; set; }
        public decimal Price { get; set; }
        public int SL { get; set; }
        public decimal Amount { get; set; }
        public CartItem(int id) { }
        public CartItem(int proid, string name, string img, decimal price,int Sl)
        {
            this.ProductId = proid;
            this.Name = name;
            this.Img = img;
            this.Price = price;
            this.SL = Sl;
            this.Amount = price*Sl;
        }

    }
}