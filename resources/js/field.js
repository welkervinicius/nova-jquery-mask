import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'
import PreviewField from './components/PreviewField'

Nova.booting((app, store) => {
  app.component('index-nova-jquery-mask', IndexField)
  app.component('detail-nova-jquery-mask', DetailField)
  app.component('form-nova-jquery-mask', FormField)
  // app.component('preview-nova-jquery-mask', PreviewField)
})
