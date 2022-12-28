using System;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;


namespace MyClass.Models
{
    [Table("Products")]
    public class Product
    {
        [Key]
        public int Id { get; set; }
        
        public string Name { get; set; }

        public string Slug { get; set; }
       
        public string Deltail { get; set; }
        
        public string MetaDesc { get; set; }
       
        public string MetaKey { get; set; }
        public string Img { get; set; }
        public int CatId { get; set; }
        public decimal Price { get; set; }
        public string PriceSale { get; set; }
        public int? CreateBy { get; set; }
        public DateTime? CreateAt { get; set; }
        public int? UpdateBy { get; set; }
        public DateTime? UpdateAt { get; set; }
        public int Status { get; set; }
    }
}
