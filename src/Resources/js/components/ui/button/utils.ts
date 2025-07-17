import { ButtonVariants, buttonTypes, buttonIcons } from '.'
import { Button } from '../../../interfaces/UI/Button'

export function getButtonProps({
  buttonType,
  variant,
  icon,
  rawIcon
}: Button = {}) {
  const resolvedType = buttonType && buttonType in buttonTypes ? buttonType : null
  if (resolvedType) {
      const typeData = buttonTypes[resolvedType]
      const resolvedIconKey = icon ?? (typeData.icon as keyof typeof buttonIcons)
      const resolvedIcon = rawIcon ?? (resolvedIconKey in buttonIcons ? buttonIcons[resolvedIconKey] : null)
      return {
        icon: resolvedIcon ?? null,
        variant: variant ?? (typeData.variant as ButtonVariants['variant']),
      }
  }else{
    return {
      icon: icon,
      variant: variant ?? 'default',
    }
  }
}
