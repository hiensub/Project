using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations.Schema;
using System.ComponentModel.DataAnnotations;


namespace MyClass.Models
{
    [Table("Posts")]
    public class Post
    {
        [Key]
        public int Id { get; set; }
        
        public int? TopicId { get; set; }
        //[Required(ErrorMessage = "Tiêu đề bài viết không thể để trống")]
        public string Title { get; set; }
        public string Slug { get; set; }
        //[Required(ErrorMessage = "Nội dung bài viết không thể để trống")]
        public string Delail { get; set; }
        public string Img { get; set; }
        public string PostType { get; set; }
        public string Sale { get; set; }
        //[Required(ErrorMessage = "Từ khóa SEO không thể để trống")]
        public string MetaDesc { get; set; }
        //[Required(ErrorMessage = "Mô tả khóa SEO không thể để trống")]
        public string MetaKey { get; set; }
        public int? CreateBy { get; set; }
        public DateTime? CreateAt { get; set; }
        public int? UpdateBy { get; set; }
        public DateTime? UpdateAt { get; set; }
        public int Status { get; set; }
    }
}
