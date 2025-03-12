<template>
<div>

 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                MENGUBAH URUTAN TOPIK MATERI
                                <small>Ubah urutan <code>Topik</code> materi dengan menggeser tanda <code><i class="fa fa-sort"></i></code> ke atas atau ke bawah</small>
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                   <tr>
                                        <th></th>
                                        <th>Topik</th>
                                        <th>Nama Materi</th>
                                        <th>Konten</th> 
                                        <th>Pelajaran</th>
                                        
                                        
                                    </tr>
                                </thead>
                   <draggable :list="materisNew" :options="{animation:200}" :element="'tbody'" @change="update">             
                <tr v-for="(materi,index) in materisNew">
                <td><i class="fa fa-sort"></i></td>
                <td v-if="materi.order == 'baru' "><span class="badge bg-pink">{{ materi.order }}</span></td>
                <td v-else>{{ materi.order }}</td>
                <td>{{ materi.title }}</td>
                <td>{{ getPostContent(materi) }}</td>
                 <td>{{ materi.pelajaran.name }}</td>   
               
               
                </tr>
                </draggable> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
</template>

<script>
	import draggable from 'vuedraggable'
    export default {
	components: {
            draggable
        },
	props: ['materis'],
	     data() {
            return {
                  materisNew: this.materis,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },
		        methods: {
                 update() {
                     this.materisNew.map((materi, index) => {
                     materi.order = index + 1;
                   })
				
				      axios.put('/materi/updateAll', {
                    materis: this.materisNew
               }).then((response) => {
                    // success message
                  })
                },

                getPostContent (materi) {
            let content = this.stripTags(materi.content);

            return content.length > 30 ? content.substring(0, 30) + ' ...' : content;           
        },

        stripTags (text) {
            return text.replace(/(<([^>]+)>)/ig, '');
        }
    
    
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
