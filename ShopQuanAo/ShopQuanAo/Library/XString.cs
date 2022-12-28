using System;
using System.Collections.Generic;
using System.Linq;
using System.Text.RegularExpressions;
using System.Web;
using System.Security.Cryptography;
using System.Text;

namespace ShopQuanAo.Library
{
    public static class XString
    {
        public static string Str_slug(string s)
        {
            String[][] symbols ={
                                    new String[]{"[áàảãạắằẳẵặấầẩẫậ]","a"},
                                    new String[]{"[đ]","d"},
                                    new String[]{"[éèẻẽẹếềểễệ]","e"},
                                    new String[]{"[íìỉĩị]","i"},
                                    new String[]{"[óòỏõọớờởỡợ]","o"},
                                    new String[]{"[úùủũụứừửữự]","u"},
                                    new String[]{"[ýỳỷỹỵ]","y"},
                                    new String[]{"[\\s'\";,]","-"}
                                };
            s = s.ToLower();
            foreach (var ss in symbols)
            {
                s = Regex.Replace(s, ss[0], ss[1]);
            }
            return s;
        }
        public static string Str_String(this string str, int? length)
        {
            int lengt = (length ?? 20);
            if (str.Length>lengt)
            {
                str = str.Substring(0, lengt) + "...";
            }


            return str;
        }
        public static string ToMd5(this string str)
        {
            MD5CryptoServiceProvider md5 = new MD5CryptoServiceProvider();
            byte[] bHash = md5.ComputeHash(Encoding.UTF8.GetBytes(str));
            StringBuilder sbHash = new StringBuilder();
            foreach(byte b in bHash){
                sbHash.Append(String.Format("{0:x2}", b));
            }
            return sbHash.ToString();
        }
        public static string ToshortString(this string str, int? length)
        {
            int lengt = (length ?? 20);
            if (str.Length>lengt)
            {
                str = str.Substring(0, lengt) + "...";
            }
            return str;
        }
    }
}