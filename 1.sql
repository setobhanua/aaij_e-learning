USE [EL]
GO
/****** Object:  Table [dbo].[el_book]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_book](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_genre] [varchar](50) NULL,
	[title] [varchar](100) NULL,
	[sinopsis] [varchar](255) NULL,
	[date] [datetime] NULL,
	[file] [varchar](255) NULL,
 CONSTRAINT [PK_el_book] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_book_genre]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_book_genre](
	[id] [int] NOT NULL,
	[genre] [varchar](100) NOT NULL,
 CONSTRAINT [PK_el_book_genre] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_ebook]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_ebook](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_genre] [varchar](50) NULL,
	[title] [varchar](100) NULL,
	[sinopsis] [varchar](255) NULL,
	[date] [datetime] NULL,
	[file] [varchar](255) NULL,
 CONSTRAINT [PK_el_ebook_1] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_ebook_genre]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_ebook_genre](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[genre] [varchar](100) NOT NULL,
 CONSTRAINT [PK_el_ebook_genre] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_faq]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_faq](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nama] [varchar](50) NULL,
	[email] [varchar](50) NULL,
	[pertanyaan] [varchar](500) NULL,
	[tanggal] [datetime] NULL,
 CONSTRAINT [PK_el_faq] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_module]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_module](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[golongan] [int] NULL,
	[title] [varchar](255) NOT NULL,
	[description] [varchar](255) NULL,
	[thumbnail] [varchar](255) NOT NULL,
	[closed] [date] NOT NULL,
	[created_at] [datetime] NOT NULL,
 CONSTRAINT [PK_el_module] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_module_detail]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_module_detail](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_module] [int] NULL,
	[title] [varchar](255) NULL,
	[content] [text] NULL,
	[file] [varchar](255) NULL,
 CONSTRAINT [PK_el_module_detail] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_pengumuman]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_pengumuman](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[judul] [varchar](50) NULL,
	[date] [datetime] NULL,
	[file] [varchar](250) NULL,
 CONSTRAINT [PK_el_pengumuman] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_sic]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_sic](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](50) NULL,
	[description] [varchar](250) NULL,
	[date] [date] NULL,
	[file] [varchar](255) NULL,
 CONSTRAINT [PK_el_sic] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_sic_comment]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_sic_comment](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_sic] [int] NULL,
	[user_npk] [int] NULL,
	[comment] [varchar](500) NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [PK_el_sic_comment] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_sic_comment2]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_sic_comment2](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_sic] [int] NULL,
	[user_npk] [int] NULL,
	[comment] [varchar](500) NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [PK_el_sic_comment2] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_sic2]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_sic2](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](50) NULL,
	[description] [varchar](250) NULL,
	[date] [date] NULL,
	[file] [varchar](255) NULL,
 CONSTRAINT [PK_el_sic2] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_user]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_user](
	[user_npk] [varchar](5) NOT NULL,
	[user_nama] [varchar](50) NULL,
	[user_desc_div] [varchar](50) NULL,
	[user_desc_dept] [varchar](50) NULL,
	[user_desc_sie] [varchar](50) NULL,
	[user_password] [varchar](50) NULL,
	[user_aktif] [bit] NULL,
	[user_last_login] [datetime] NULL,
	[user_admin] [bit] NULL,
	[user_email] [varchar](50) NULL,
	[user_gol] [varchar](50) NULL,
 CONSTRAINT [PK_Table_1] PRIMARY KEY CLUSTERED 
(
	[user_npk] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_user_class]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_user_class](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user_npk] [int] NOT NULL,
	[type] [varchar](50) NOT NULL,
	[subject_id] [int] NOT NULL,
	[progress] [int] NULL,
	[time] [int] NULL,
 CONSTRAINT [PK_el_user_class] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_video]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_video](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](50) NULL,
	[description] [varchar](255) NULL,
	[date] [date] NULL,
	[file] [varchar](255) NULL,
 CONSTRAINT [PK_el_video] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[el_video_comment]    Script Date: 31/05/2021 14:42:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[el_video_comment](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_video] [int] NULL,
	[user_npk] [int] NULL,
	[comment] [varchar](500) NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [PK_el_video_comment] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[el_book] ON 

INSERT [dbo].[el_book] ([id], [id_genre], [title], [sinopsis], [date], [file]) VALUES (54, N'2', N'Grit The Power of Passion and Perseverance by Angela Duckworth', N'Grit The Power of Passion and Perseverance by Angela Duckworth', CAST(N'2021-04-30T00:00:00.000' AS DateTime), N'assets/uploads/BOOKab36679121d1b78ab7ec751b5df0c29e.org)')
INSERT [dbo].[el_book] ([id], [id_genre], [title], [sinopsis], [date], [file]) VALUES (55, N'2', N'How to Manage Your Boss Developing the Perfect Working Relationship by Ros Jay', N'How to Manage Your Boss Developing the Perfect Working Relationship by Ros Jay', CAST(N'2021-04-30T00:00:00.000' AS DateTime), N'assets/uploads/BOOK619e3f8cac4ecdc50b94751268185aab.org)')
INSERT [dbo].[el_book] ([id], [id_genre], [title], [sinopsis], [date], [file]) VALUES (56, N'2', N'How to Win Friends and Influence People in the Digital Age by Dale Carnegie and Associates', N'How to Win Friends and Influence People in the Digital Age by Dale Carnegie and Associates', CAST(N'2021-04-30T00:00:00.000' AS DateTime), N'assets/uploads/BOOKc03ae91cad3273f50eca938ee378c148.org)')
INSERT [dbo].[el_book] ([id], [id_genre], [title], [sinopsis], [date], [file]) VALUES (57, N'7', N'Financial Planning During The Crisis', N'Financial Planning During The Crisis', CAST(N'2021-05-01T00:00:00.000' AS DateTime), N'assets/uploads/BOOK4cf00d9dfbbc13aa633c4f44b787a993.ppt')
SET IDENTITY_INSERT [dbo].[el_book] OFF
GO
INSERT [dbo].[el_book_genre] ([id], [genre]) VALUES (1, N'Bahasa')
INSERT [dbo].[el_book_genre] ([id], [genre]) VALUES (2, N'Pengembangan Diri')
INSERT [dbo].[el_book_genre] ([id], [genre]) VALUES (3, N'Teknik')
INSERT [dbo].[el_book_genre] ([id], [genre]) VALUES (4, N'Agama')
INSERT [dbo].[el_book_genre] ([id], [genre]) VALUES (5, N'Hobi')
INSERT [dbo].[el_book_genre] ([id], [genre]) VALUES (6, N'Biografi')
INSERT [dbo].[el_book_genre] ([id], [genre]) VALUES (7, N'Lainnya')
GO
SET IDENTITY_INSERT [dbo].[el_ebook] ON 

INSERT [dbo].[el_ebook] ([id], [id_genre], [title], [sinopsis], [date], [file]) VALUES (1, N'5', N'Tempor delectus in ', N'Iusto rem cumque rer', CAST(N'1972-03-20T00:00:00.000' AS DateTime), N'assets/uploads/BOOK5d05d93894635047aa8b275649bf1971.pdf')
SET IDENTITY_INSERT [dbo].[el_ebook] OFF
GO
SET IDENTITY_INSERT [dbo].[el_ebook_genre] ON 

INSERT [dbo].[el_ebook_genre] ([id], [genre]) VALUES (1, N'Bahasa')
INSERT [dbo].[el_ebook_genre] ([id], [genre]) VALUES (2, N'Pengembangan Diri')
INSERT [dbo].[el_ebook_genre] ([id], [genre]) VALUES (3, N'Teknik')
INSERT [dbo].[el_ebook_genre] ([id], [genre]) VALUES (4, N'Agama')
INSERT [dbo].[el_ebook_genre] ([id], [genre]) VALUES (5, N'Hobi')
INSERT [dbo].[el_ebook_genre] ([id], [genre]) VALUES (6, N'Biografi')
INSERT [dbo].[el_ebook_genre] ([id], [genre]) VALUES (7, N'Lainnya')
SET IDENTITY_INSERT [dbo].[el_ebook_genre] OFF
GO
SET IDENTITY_INSERT [dbo].[el_faq] ON 

INSERT [dbo].[el_faq] ([id], [nama], [email], [pertanyaan], [tanggal]) VALUES (14, N'Seto Bhanu Adyatma', N'adyatmabanu7@gmail.com', N'nanya apa aja deh boleh kah
', CAST(N'2021-05-28T12:58:53.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[el_faq] OFF
GO
SET IDENTITY_INSERT [dbo].[el_module] ON 

INSERT [dbo].[el_module] ([id], [golongan], [title], [description], [thumbnail], [closed], [created_at]) VALUES (49, NULL, N'Non nobis in ut dist', N'Ut duis veniam ad n', N'assets/uploads/MODULEHead84abf2ada8e162752d0770109f73a9ef.jpg', CAST(N'2021-05-31' AS Date), CAST(N'2021-05-29T14:38:56.740' AS DateTime))
INSERT [dbo].[el_module] ([id], [golongan], [title], [description], [thumbnail], [closed], [created_at]) VALUES (50, 2, N'Nulla ducimus sequi', N'Eaque ea fuga Sit ', N'assets/uploads/MODULEHeadaf2332de3429c97400e2bc56c2e959e7.png', CAST(N'2021-05-31' AS Date), CAST(N'2021-05-29T14:40:27.367' AS DateTime))
SET IDENTITY_INSERT [dbo].[el_module] OFF
GO
SET IDENTITY_INSERT [dbo].[el_module_detail] ON 

INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (1, 1, N'Bab 1', N'<p>Something</p>', N'assets/uploads/MODULEDete4592250d12e98e0787ba342aa97459e.jpg')
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (2, 1, N'Bab 2', N'<p>Something</p>', N'assets/uploads/MODULEDetbe1198b19ac6363eebf767eaa62cfa0d.jpg')
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (3, 1, N'Bab 3', N'<p>Something</p>', N'assets/uploads/MODULEDet372d981d5b429483a439032a33aceac5.jpg')
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (4, 1, N'Bab 1', N'<p>Something</p>', N'assets/uploads/MODULEDete2194b28c5868eaac0fbc2e57e0da4c0.jpg')
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (36, 41, N'Video Materi', N'<p><iframe src="https://www.youtube.com/embed/a66-NYb3p0k" width="560" height="314" allowfullscreen="allowfullscreen"></iframe></p>', NULL)
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (37, 41, N'Quiz ', N'<p><a title="5S/5R" href="https://docs.google.com/forms/d/1QXxDtQDMb22Q5oQjqeRIQ3lt340zBfrwqz173M76fPc/edit?usp=sharing" target="_blank" rel="noopener">Open for quiz 5S/5R</a></p>', NULL)
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (45, 46, N'Bab 1', N'<p style="margin: 0.5em 0px; color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;"><strong>Hindia Belanda</strong>&nbsp;atau&nbsp;<strong>Hindia Timur Belanda</strong>&nbsp;(<a style="text-decoration-line: none; color: #0645ad; background: none;" title="Bahasa Belanda" href="https://id.wikipedia.org/wiki/Bahasa_Belanda">bahasa Belanda</a>:&nbsp;<span lang="nl"><em>Nederlands(ch)-Indi&euml;</em></span>) adalah sebuah daerah&nbsp;<a style="text-decoration-line: none; color: #0645ad; background: none;" title="Imperium Belanda" href="https://id.wikipedia.org/wiki/Imperium_Belanda">pendudukan Belanda</a>&nbsp;yang wilayahnya saat ini dikenal dengan nama&nbsp;<a class="mw-redirect" style="text-decoration-line: none; color: #0645ad; background: none;" title="Republik Indonesia" href="https://id.wikipedia.org/wiki/Republik_Indonesia">Republik Indonesia</a>. Hindia Belanda dibentuk sebagai hasil dari nasionalisasi koloni-koloni&nbsp;<a style="text-decoration-line: none; color: #0645ad; background: none;" title="Vereenigde Oostindische Compagnie" href="https://id.wikipedia.org/wiki/Vereenigde_Oostindische_Compagnie">Vereenigde Oostindische Compagnie</a>&nbsp;(VOC), yang berada di bawah pemerintahan&nbsp;<a style="text-decoration-line: none; color: #0645ad; background: none;" title="Republik Batavia" href="https://id.wikipedia.org/wiki/Republik_Batavia">Belanda</a>&nbsp;pada tahun 1800.</p>
<p style="margin: 0.5em 0px; color: #202122; font-family: sans-serif; font-size: 14px; background-color: #ffffff;">Selama abad ke-19, daerah jajahan dan hegemoni Belanda diperluas, mencapai batas wilayah teritorial terbesar mereka pada awal abad ke-20. Hindia Belanda adalah salah satu koloni Eropa yang paling berharga di bawah kekuasaan&nbsp;<a style="text-decoration-line: none; color: #0645ad; background: none;" title="Imperium Belanda" href="https://id.wikipedia.org/wiki/Imperium_Belanda">Imperium Belanda</a>,<sup id="cite_ref-6" class="reference" style="line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;"><a style="text-decoration-line: none; color: #0645ad; background: none;" href="https://id.wikipedia.org/wiki/Hindia_Belanda#cite_note-6">[6]</a></sup>&nbsp;dan berkontribusi pada keunggulan global Belanda dalam perdagangan rempah-rempah dan&nbsp;<a style="text-decoration-line: none; color: #0645ad; background: none;" title="" href="https://id.wikipedia.org/wiki/Tanaman_dagang">hasil bumi</a>&nbsp;pada abad ke-19 sampai awal abad ke-20.<sup id="cite_ref-7" class="reference" style="line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;"><a style="text-decoration-line: none; color: #0645ad; background: none;" href="https://id.wikipedia.org/wiki/Hindia_Belanda#cite_note-7">[7]</a></sup>&nbsp;Tatanan sosial kolonial didasarkan pada struktur rasial dan sosial yang kaku dengan para elit Belanda yang tinggal terpisah tetapi tetap berhubungan dengan penduduk pribumi yang dijajah mereka.<sup id="cite_ref-8" class="reference" style="line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;"><a style="text-decoration-line: none; color: #0645ad; background: none;" href="https://id.wikipedia.org/wiki/Hindia_Belanda#cite_note-8">[8]</a></sup>&nbsp;Istilah "<em>Indonesia</em>" mulai digunakan untuk lokasi geografis setelah tahun 1880. Pada awal abad 20, para intelektual lokal mulai mengembangkan konsep&nbsp;<a style="text-decoration-line: none; color: #0645ad; background: none;" title="Indonesia" href="https://id.wikipedia.org/wiki/Indonesia">Indonesia</a>&nbsp;sebagai negara dan bangsa, dan menetapkan panggung untuk gerakan kemerdekaan.<sup id="cite_ref-9" class="reference" style="line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;"><a style="text-decoration-line: none; color: #0645ad; background: none;" href="https://id.wikipedia.org/wiki/Hindia_Belanda#cite_note-9">[9]</a></sup></p>', NULL)
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (46, 1, N'Labore incidunt fug', N'<p>tes</p>', NULL)
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (47, 49, N'Assumenda laudantium', N'<p>https://www.youtube.com/watch?v=jbTmGd_GrDw&amp;list=PL-CtdCApEFH8dJMuQGojbjUdLEty8mqYF&amp;index=13</p>', NULL)
INSERT [dbo].[el_module_detail] ([id], [id_module], [title], [content], [file]) VALUES (48, 50, N'Qui repudiandae ea e', N'<p>jadi misalkan dibawah ini ada module</p>', NULL)
SET IDENTITY_INSERT [dbo].[el_module_detail] OFF
GO
SET IDENTITY_INSERT [dbo].[el_pengumuman] ON 

INSERT [dbo].[el_pengumuman] ([id], [judul], [date], [file]) VALUES (8, N'saf', CAST(N'2021-05-28T14:19:22.000' AS DateTime), N'assets/uploads/2511d944a84d4f654eee1a477235b772.pdf')
SET IDENTITY_INSERT [dbo].[el_pengumuman] OFF
GO
SET IDENTITY_INSERT [dbo].[el_sic] ON 

INSERT [dbo].[el_sic] ([id], [title], [description], [date], [file]) VALUES (1, N'Commodi officiis dis', N'Omnis eveniet minim', CAST(N'2016-02-19' AS Date), N'https://www.youtube.com/watch?v=jbTmGd_GrDw&list=PL-CtdCApEFH8dJMuQGojbjUdLEty8mqYF')
INSERT [dbo].[el_sic] ([id], [title], [description], [date], [file]) VALUES (2, N'Voluptatum blanditii', N'<p>Corporis quidem pari</p>
<p>&nbsp;</p>
<p>raffi ahmad nagita slavina</p>', CAST(N'1976-02-17' AS Date), N'https://www.youtube.com/watch?v=jbTmGd_GrDw&list=PL-CtdCApEFH8dJMuQGojbjUdLEty8mqYF')
INSERT [dbo].[el_sic] ([id], [title], [description], [date], [file]) VALUES (3, N'Dolor non sint odit ', N'<p>cuma coba aja ayok</p>', CAST(N'2013-09-16' AS Date), N'https://www.youtube.com/watch?v=jbTmGd_GrDw&list=PL-CtdCApEFH8dJMuQGojbjUdLEty8mqYF')
INSERT [dbo].[el_sic] ([id], [title], [description], [date], [file]) VALUES (4, N'Test Youtube Video', N'<p>Something goes here</p>', CAST(N'2021-05-31' AS Date), N'https://www.youtube.com/watch?v=l3zw5eFlH2I')
SET IDENTITY_INSERT [dbo].[el_sic] OFF
GO
SET IDENTITY_INSERT [dbo].[el_sic_comment] ON 

INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (1, 2, 99803, N'komen1
', CAST(N'2021-05-06T10:07:47.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (2, 1, 99803, N'rtes
', CAST(N'2021-05-06T13:20:49.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (3, 2, 99803, N'coba satu

as', CAST(N'2021-05-18T15:52:17.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (4, 3, 99804, N'test
', CAST(N'2021-05-22T21:27:24.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (5, 3, 99803, N'Test', CAST(N'2021-05-23T12:39:43.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (6, 3, 99803, N'Tesstds', CAST(N'2021-05-23T12:39:51.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (7, 3, 99803, N'asdasd', CAST(N'2021-05-23T12:39:57.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (8, 3, 99803, N'asd', CAST(N'2021-05-23T12:40:01.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (9, 3, 99803, N'asdasdasdasd', CAST(N'2021-05-23T12:40:05.000' AS DateTime))
INSERT [dbo].[el_sic_comment] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (10, 3, 99803, N'asd
', CAST(N'2021-05-23T12:40:31.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[el_sic_comment] OFF
GO
SET IDENTITY_INSERT [dbo].[el_sic_comment2] ON 

INSERT [dbo].[el_sic_comment2] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (1, 1, 99803, N'Test', CAST(N'2021-05-23T12:45:57.000' AS DateTime))
INSERT [dbo].[el_sic_comment2] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (2, 1, 99803, N'Test lagi', CAST(N'2021-05-23T12:46:03.000' AS DateTime))
INSERT [dbo].[el_sic_comment2] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (3, 1, 99803, N'asdasd', CAST(N'2021-05-23T12:46:07.000' AS DateTime))
INSERT [dbo].[el_sic_comment2] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (4, 1, 99803, N'asd', CAST(N'2021-05-23T12:46:12.000' AS DateTime))
INSERT [dbo].[el_sic_comment2] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (5, 1, 99803, N'asdasdasd', CAST(N'2021-05-23T12:46:21.000' AS DateTime))
INSERT [dbo].[el_sic_comment2] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (6, 1, 99803, N'Testing test
', CAST(N'2021-05-23T12:46:46.000' AS DateTime))
INSERT [dbo].[el_sic_comment2] ([id], [id_sic], [user_npk], [comment], [created_at]) VALUES (7, 2, 99803, N'kom
', CAST(N'2021-05-28T10:33:46.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[el_sic_comment2] OFF
GO
SET IDENTITY_INSERT [dbo].[el_sic2] ON 

INSERT [dbo].[el_sic2] ([id], [title], [description], [date], [file]) VALUES (1, N'Amet non quae sunt ', N'Et id recusandae Au', CAST(N'1983-11-29' AS Date), N'https://www.youtube.com/watch?v=jbTmGd_GrDw&list=PL-CtdCApEFH8dJMuQGojbjUdLEty8mqYF')
INSERT [dbo].[el_sic2] ([id], [title], [description], [date], [file]) VALUES (2, N'Test Youtube Video', N'<p>Something goes here</p>', CAST(N'2021-05-31' AS Date), N'https://www.youtube.com/watch?v=l3zw5eFlH2I')
INSERT [dbo].[el_sic2] ([id], [title], [description], [date], [file]) VALUES (6, N'AICast 1', N'<p>Tips Sehat Dr. Komala</p>', CAST(N'2021-05-28' AS Date), N'https://www.youtube.com/watch?v=2moUQV_YPkU&list=PL2dfyj-z-HC-arzEOTsHZ65UNKp9DLD0b&index=2')
SET IDENTITY_INSERT [dbo].[el_sic2] OFF
GO
INSERT [dbo].[el_user] ([user_npk], [user_nama], [user_desc_div], [user_desc_dept], [user_desc_sie], [user_password], [user_aktif], [user_last_login], [user_admin], [user_email], [user_gol]) VALUES (N'99801', N'Jalaluddin Hanif', NULL, N'IT', N'System Development', N'21232f297a57a5a743894a0e4a801fc3', 1, CAST(N'2021-05-28T14:03:48.000' AS DateTime), 0, NULL, N'1')
INSERT [dbo].[el_user] ([user_npk], [user_nama], [user_desc_div], [user_desc_dept], [user_desc_sie], [user_password], [user_aktif], [user_last_login], [user_admin], [user_email], [user_gol]) VALUES (N'99802', N'Adnriyan Fikry', NULL, N'IT', N'System Development', N'ee11cbb19052e40b07aac0ca060c23ee', 1, CAST(N'2021-05-30T09:46:36.000' AS DateTime), 0, NULL, N'2')
INSERT [dbo].[el_user] ([user_npk], [user_nama], [user_desc_div], [user_desc_dept], [user_desc_sie], [user_password], [user_aktif], [user_last_login], [user_admin], [user_email], [user_gol]) VALUES (N'99803', N'Seto Bhanu Adyatma', N'', N'IT', N'System Development', N'21232f297a57a5a743894a0e4a801fc3', 1, CAST(N'2021-05-31T10:05:34.000' AS DateTime), 1, N'adyatmabanu7@gmail.com', N'3')
INSERT [dbo].[el_user] ([user_npk], [user_nama], [user_desc_div], [user_desc_dept], [user_desc_sie], [user_password], [user_aktif], [user_last_login], [user_admin], [user_email], [user_gol]) VALUES (N'99804', N'Yura ', NULL, N'IT', N'System Development', N'58cc5fb7be4521fb02a4692478b937c4', 1, CAST(N'2021-05-28T14:03:59.000' AS DateTime), 0, NULL, N'1')
GO
SET IDENTITY_INSERT [dbo].[el_user_class] ON 

INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (1, 99803, N'module', 12, 22, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (2, 99803, N'module', 9, 67, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (3, 99802, N'module', 14, NULL, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (4, 99803, N'module', 14, NULL, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (5, 99803, N'module', 19, 17, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (6, 99803, N'module', 18, 53, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (7, 99803, N'module', 24, 100, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (8, 99803, N'module', 25, 100, 2)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (9, 99803, N'module', 26, 100, 106)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (10, 99803, N'module', 27, 100, 39)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (11, 99803, N'module', 29, 100, 19)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (12, 99803, N'module', 30, 100, 98)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (13, 99803, N'module', 31, 100, 2)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (14, 99804, N'module', 31, 100, 30)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (15, 99803, N'module', 32, 100, 8)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (16, 99803, N'module', 35, NULL, NULL)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (17, 99803, N'module', 36, 100, 16)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (18, 99802, N'module', 37, 100, 98)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (19, 99802, N'module', 28, 101, 4)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (20, 99803, N'module', 37, 100, 9)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (21, 99803, N'module', 34, 100, 2)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (22, 99803, N'module', 38, 100, 8)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (23, 99803, N'module', 39, 81, 0)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (24, 99803, N'module', 40, 99, 23)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (25, 99803, N'module', 41, 100, 43)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (26, 99801, N'module', 40, 58, 2)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (27, 99801, N'module', 41, 32, 1)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (28, 99804, N'module', 41, 100, 1)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (29, 99803, N'module', 42, 101, 1)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (30, 99803, N'module', 43, 100, 22)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (31, 99803, N'module', 44, 100, 24)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (32, 99803, N'module', 45, 100, 193)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (33, 99801, N'module', 43, 98, 2)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (34, 99803, N'module', 46, 100, 46)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (35, 99803, N'module', 48, 101, 7)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (36, 99803, N'module', 49, 101, 1)
INSERT [dbo].[el_user_class] ([id], [user_npk], [type], [subject_id], [progress], [time]) VALUES (37, 99802, N'module', 50, 101, 5)
SET IDENTITY_INSERT [dbo].[el_user_class] OFF
GO
SET IDENTITY_INSERT [dbo].[el_video] ON 

INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1016, N'Company Profile PT Akebono Brake Astra Indonesia', N'Company Profile PT Akebono Brake Astra Indonesia

ttd contoh', CAST(N'2021-05-21' AS Date), N'https://www.youtube.com/watch?v=jbTmGd_GrDw&list=PL-CtdCApEFH8dJMuQGojbjUdLEty8mqYF')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1017, N'Test Error 1', N'<p>Something goes here</p>', CAST(N'2021-05-23' AS Date), N'https://www.youtube.com/watch?v=ul-MqhLLVwo&list=PLvD-BCg343ivEYYj7pac-gBfruaDaJ4T5')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1018, N'Consequuntur et adip', N'<p>adsv</p>', CAST(N'2021-05-27' AS Date), N'https://www.youtube.com/watch?v=jbTmGd_GrDw&list=PL-CtdCApEFH8dJMuQGojbjUdLEty8mqYF')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1019, N'Elit Nam quis do vo', N'', CAST(N'1976-11-18' AS Date), N'https://www.youtube.com/watch?v=ul-MqhLLVwo&list=PLvD-BCg343ivEYYj7pac-gBfruaDaJ4T5')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1020, N'Test Youtube Video', N'<p>Some description here</p>', CAST(N'2021-05-31' AS Date), N'https://www.youtube.com/watch?v=l3zw5eFlH2I')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1023, N'Opening Janji Suci', N'', CAST(N'2021-05-27' AS Date), N'https://www.youtube.com/watch?v=2moUQV_YPkU&list=PL2dfyj-z-HC-arzEOTsHZ65UNKp9DLD0b&index=2')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1028, N'Quae aut ullam volup', N'<p>das</p>', CAST(N'1983-12-12' AS Date), N'https://www.youtube.com/watch?v=2moUQV_YPkU&list=PL2dfyj-z-HC-arzEOTsHZ65UNKp9DLD0b&index=2')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1029, N'https://www.youtube.com', N'<p>https://www.youtube.com/watch?v=2moUQV_YPkU&amp;list=PL2dfyj-z-HC-arzEOTsHZ65UNKp9DLD0b&amp;index=2</p>', CAST(N'2021-05-28' AS Date), N'https://www.youtube.com/watch?v=2moUQV_YPkU&list=PL2dfyj-z-HC-arzEOTsHZ65UNKp9DLD0b&index=2')
INSERT [dbo].[el_video] ([id], [title], [description], [date], [file]) VALUES (1030, N'Superstar', N'', CAST(N'2021-05-28' AS Date), N'https://www.youtube.com/watch?v=fmKK-Pjjq5k&list=PLL_BsAw0EbpMJw7pymDpDINpZffnOVP2b&index=1&t=55s')
SET IDENTITY_INSERT [dbo].[el_video] OFF
GO
SET IDENTITY_INSERT [dbo].[el_video_comment] ON 

INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (4, 1012, 99803, N'Test Test Test', CAST(N'2021-05-02T22:08:16.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (7, 1011, 99802, N'hello world
', CAST(N'2021-05-03T08:15:58.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (8, 1010, 99802, N'halo
', CAST(N'2021-05-03T09:01:02.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (9, 1011, 99803, N'nyoba aja
', CAST(N'2021-05-03T10:20:33.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (10, 1012, 99802, N'jajalen', CAST(N'2021-05-03T10:52:53.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (11, 1013, 99803, N'koo
', CAST(N'2021-05-05T11:18:19.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (12, 1010, 99803, N'wah bagud
', CAST(N'2021-05-05T15:22:30.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (13, 1014, 99803, N'komen
', CAST(N'2021-05-05T16:38:40.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (14, 1010, 99803, N'tes', CAST(N'2021-05-07T10:41:43.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (15, 1010, 99803, N'komenan
', CAST(N'2021-05-07T14:28:48.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (16, 1010, 99804, N'tes
', CAST(N'2021-05-21T09:38:14.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (17, 1016, 99803, N'test
', CAST(N'2021-05-21T13:25:48.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (18, 1016, 99804, N'shock', CAST(N'2021-05-22T21:27:40.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (19, 1016, 99803, N'Test', CAST(N'2021-05-23T11:58:46.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (20, 1016, 99803, N'Some', CAST(N'2021-05-23T11:58:53.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (21, 1016, 99803, N'Someone', CAST(N'2021-05-23T11:58:59.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (22, 1016, 99803, N'New
', CAST(N'2021-05-23T12:01:49.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (23, 1017, 99802, N'test
', CAST(N'2021-05-23T17:38:05.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (24, 1017, 99802, N'sda', CAST(N'2021-05-23T17:38:09.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (25, 1017, 99802, N'ads', CAST(N'2021-05-23T17:38:14.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (26, 1017, 99802, N'das', CAST(N'2021-05-23T17:38:19.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (27, 1017, 99802, N'asd', CAST(N'2021-05-23T17:38:24.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (28, 1017, 99802, N'das', CAST(N'2021-05-23T17:38:32.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (29, 1019, 99803, N'test', CAST(N'2021-05-27T14:29:59.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (30, 1019, 99803, N'EFR
', CAST(N'2021-05-31T14:40:12.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (31, 1019, 99803, N'FEW', CAST(N'2021-05-31T14:40:16.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (32, 1019, 99803, N'EW', CAST(N'2021-05-31T14:40:20.000' AS DateTime))
INSERT [dbo].[el_video_comment] ([id], [id_video], [user_npk], [comment], [created_at]) VALUES (33, 1019, 99803, N'WE', CAST(N'2021-05-31T14:40:24.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[el_video_comment] OFF
GO
